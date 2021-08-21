<template>
  <div class="flex mt-5 sm:mt-0">
    <!-- Buttons -->
    <template v-if="friendRequestRecievedFrom">
      <accept :profile="profile"></accept>
      <ignore :profile="profile" class="ml-3"></ignore>
    </template>

    <template v-else-if="friendRequestSentTo">
      <h3 class="font-semi-bold text-md text-gray-800 leading-tight">
        Pending
      </h3>
    </template>

    <template v-else-if="isFriendsWith">
      <form @submit.prevent="deleteFriend">
        <jet-danger-button type="submit">
          <looping-rhombuses-spinner
            :animation-duration="2500"
            :rhombus-size="10"
            class="text-white"
            v-if="loading"
          />
          <template v-else>
            Unfriend
            <icon name="user-minus" class="w-4 h-4 fill-current ml-1"></icon>
          </template>
        </jet-danger-button>
      </form>
    </template>

    <template v-else-if="$page.props.user.id != profile.id">
      <form @submit.prevent="addFriend">
        <blue-button type="submit" class="text-xs">
          <looping-rhombuses-spinner
            :animation-duration="2500"
            :rhombus-size="10"
            class="text-white"
            v-if="loading"
          />
          <template v-else>
            Add Friend
            <icon name="user-plus" class="w-4 h-4 fill-current ml-1"></icon>
          </template>
        </blue-button>
      </form>
    </template>
  </div>
</template>

<script>
import { LoopingRhombusesSpinner } from "epic-spinners";
import Accept from "./Accept";
import BlueButton from "@/Components/Buttons/BlueButton";
import Ignore from "./Ignore";
import JetDangerButton from "@/Jetstream/DangerButton";

export default {
  props: [
    "profile",
    "isFriendsWith",
    "friendRequestSentTo",
    "friendRequestRecievedFrom",
  ],

  components: {
    Accept,
    BlueButton,
    Ignore,
    JetDangerButton,
    LoopingRhombusesSpinner,
  },

  data() {
    return {
      addFriendForm: this.$inertia.form({
        user: this.profile,
      }),

      deleteFriendForm: this.$inertia.form({
        user: this.profile,
      }),
      loading: false,
    };
  },

  methods: {
    addFriend() {
      this.loading = true;
      this.addFriendForm.post(this.route("friends.store", this.profile.id), {
        preserveScroll: true,
        onSuccess: () => {
          this.loading = false;
        },
      });
    },

    deleteFriend() {
      this.loading = true;
      this.deleteFriendForm.delete(
        this.route("friends.destroy", this.profile.id),
        {
          preserveScroll: true,
          onSuccess: () => {
            this.loading = false;
          },
        }
      );
    },
  },
};
</script>
