<template>
  <div>
    <!-- Holds accept form -->

    <form @submit.prevent="acceptFriend">
      <green-button type="submit" class="text-xs">
        <looping-rhombuses-spinner
          :animation-duration="2500"
          :rhombus-size="10"
          class="text-white"
          v-if="loading"
        />
        <template v-else>
          <div>
            Accept
            <icon name="user-plus" class="w-4 h-4 fill-current ml-1"></icon>
          </div>
        </template>
      </green-button>
    </form>
  </div>
</template>

<script>
import { LoopingRhombusesSpinner } from "epic-spinners";
import GreenButton from "@/Components/Buttons/GreenButton";

export default {
  props: ["profile"],

  components: {
    GreenButton,
    LoopingRhombusesSpinner,
  },

  data() {
    return {
      acceptFriendForm: this.$inertia.form({
        user: this.profile,
      }),
      loading: false,
    };
  },

  methods: {
    acceptFriend() {
      this.loading = true;
      this.acceptFriendForm.patch(
        this.route("friends.update", this.profile.id),
        {
          preserveScroll: true,
          onSuccess: () => {
            Toast.fire({
              icon: "success",
              title: "Successfully accepted request!",
            });

            this.loading = false;
          },
        }
      );
    },
  },
};
</script>
