<template>
  <form @submit.prevent="method" class="w-full" @csrf.prevent>
    <div>
      <textarea
        name="post"
        rows="3"
        class="border rounded px-2 py-2 w-full"
        :placeholder="`Write something ${$page.props.user.username} . . .`"
        v-model="form.body"
      ></textarea>
    </div>
    <div class="flex justify-between my-3">
      <div>
        <jet-input-error
          :message="form.errors.body"
          class="mt-2"
          v-if="form.errors.body"
        >
        </jet-input-error>
      </div>
      <div>
        <blue-button
          type="submit"
          class="text-xs"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          <looping-rhombuses-spinner
            :animation-duration="2500"
            :rhombus-size="10"
            class="text-white"
            v-if="form.processing"
          />
          <span v-else>{{ text }}</span>
        </blue-button>
      </div>
    </div>
  </form>
</template>

<script>
import { LoopingRhombusesSpinner } from "epic-spinners";
import BlueButton from "@/Components/Buttons/BlueButton";
import JetInputError from "@/Jetstream/InputError";

export default {
  props: ['method', 'form', 'text'],

  components: {
    LoopingRhombusesSpinner,
    BlueButton,
    JetInputError,
  },
};
</script>
