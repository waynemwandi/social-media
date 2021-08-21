<template>
  <div>
    <!-- Holds accept form -->

    <form @submit.prevent="acceptFriend">
      <green-button type="submit" class="text-xs">
        Accept
        <icon name="user-plus" class="w-4 h-4 fill-current ml-1"></icon>
      </green-button>
    </form>
  </div>
</template>

<script>
import GreenButton from "@/Components/Buttons/GreenButton";

export default {
  props: ["profile"],

  components: {
    GreenButton,
  },

  data() {
    return {
      acceptFriendForm: this.$inertia.form({
        user: this.profile,
      }),
    };
  },

  methods: {
    acceptFriend() {
      this.acceptFriendForm.patch(
        this.route('friends.update', this.profile.id), {
          preserveScroll: true,
          onSuccess:()=>{},
        })
    },
  },
};
</script>
