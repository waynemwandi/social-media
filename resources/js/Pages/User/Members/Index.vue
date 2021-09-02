<template>
  <pages-layout>
    <template #title>
      <div
        class="
          flex flex-col
          items-center
          sm:flex-row
          sm:justify-between
          justify-between

        "
      >
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
          <Link href="#" class="underline hover:text-blue-600"> friends </Link>
        </span>
      </div>
    </template>

    <infinite-scroll @loadMore="loadMoreMembers">
      <user-block :items="allMembers.data"></user-block>
    </infinite-scroll>
  </pages-layout>
</template>

<script>
import InfiniteScroll from "@/Components/InfiniteScroll";
import PagesLayout from "@/Layouts/PagesLayout";
import UserBlock from "@/Components/UserBlock";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  props: ["members"],

  components: {
    InfiniteScroll,
    PagesLayout,
    UserBlock,
    Link,
  },

  data() {
    return {
      allMembers: this.members,
    };
  },

  methods: {
    loadMoreMembers() {
      // checks that pagination is at the end/last page
      if (!this.allMembers.next_page_url) {
        return;
      }

      // pagination
      return axios.get(this.allMembers.next_page_url).then((resp) => {
        this.allMembers = {
          ...resp.data,
          data: [...this.allMembers.data, ...resp.data.data],
        };
      });
    },
  },
};
</script>
