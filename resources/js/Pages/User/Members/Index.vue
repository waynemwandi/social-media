<template>
  <pages-layout>
    <template #title>
      <div class="flex flex-col items-center sm:flex-row sm:justify-between">
        <h2
          class="
            flex
            items-end
            font-semibold
            text-xl text-gray-800
            leading-tight
          "
        >
          <Link
            :href="route('members.index')"
            class="capitalize hover:text-blue-600"
            style="cursor: pointer"
          >
            Members
          </Link>
        </h2>
        <span
          class="text-gray-800 leading-tight text-lg capitalize mt-5 sm:mt-0"
        >
          Visit your
          <Link
            href="#"
            class="underline hover:text-blue-600"
          >
            friends
          </Link>
        </span>
      </div>
    </template>

    <user-block :items="members.data"></user-block>

  </pages-layout>
</template>

<script>
import PagesLayout from "@/Layouts/PagesLayout";
import UserBlock from '@/Components/UserBlock';
import { Head, Link } from "@inertiajs/inertia-vue3";


export default {
  props: ["members"],

  components: {
    PagesLayout,
    UserBlock,
    Link,

  },
};
</script>
