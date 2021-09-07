<template>
  <div>
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
            <span class="underline">
              {{ `${$page.props.user.username}'s Friends` }}
            </span>
          </h2>

          <span
            class="text-gray-800 leading-tight text-lg capitalize mt-5 sm:mt-0"
          >
            Browse
            <Link
              :href="route('members.index')"
              class="underline hover:text-blue-600"
            >
              members
            </Link>
          </span>
        </div>
      </template>

      <div>
          <h3 class="font-semibold text-lg text-gray-800 leading-tight mt-5">
              Friend Requests:
          </h3>
      </div>
    </pages-layout>
  </div>
</template>

<script>
import PagesLayout from "@/Layouts/PagesLayout";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    PagesLayout,
    Link,
  },
};
</script>
