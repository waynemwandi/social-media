<template>
  <div>
    <form>
      <jet-danger-button type="submit" class="text-xs">
        Ignore
        <icon name="user-minus" class="w-4 h-4 fill-current ml-1"></icon>
      </jet-danger-button>
    </form>
  </div>
</template>

<script>
import JetDangerButton from '@/Jetstream/DangerButton'

export default {
    components: {
        JetDangerButton,
    }
};
</script>
