<template>
  <div>
    <!-- Holds accept form -->

    <form>
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
};
</script>
