<template>
  <div>
    <form @submit.prevent="ignoreRequest">
      <jet-danger-button type="submit" class="text-xs">
        <looping-rhombuses-spinner
          :animation-duration="2500"
          :rhombus-size="10"
          class="text-white"
          v-if="loading"
        />
        <template v-else>
          <div>
            Ignore
            <icon name="user-minus" class="w-4 h-4 fill-current ml-1"></icon>
          </div>
        </template>
      </jet-danger-button>
    </form>
  </div>
</template>

<script>
import JetDangerButton from "@/Jetstream/DangerButton";
import { LoopingRhombusesSpinner } from "epic-spinners";

export default {
  props: ["profile"],

  components: {
    LoopingRhombusesSpinner,
    JetDangerButton,
  },

  data() {
    return {
        loading: false
    };
  },
  methods: {
    ignoreRequest() {
      this.loading = true;
      this.$inertia.get(this.route("friends.deny", this.profile.id), {
        onSuccess: () => {
            Toast.fire({
            icon: "success",
            title: "Friend request ignored!",
          });

          this.loading = false;
        },
      });
    },
  },
};
</script>
