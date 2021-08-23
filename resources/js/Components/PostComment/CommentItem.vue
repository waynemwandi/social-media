<template>
  <div class="flex border-t border-gray-400 mt-5 py-5 space-x-5">
    <div class="flex-shrink-0">
      <Link :href="route('profiles.show', comment.user.username)">
        <img
          class="h-8 w-8 rounded-full object-cover"
          :src="comment.user.profile_photo_url"
          :alt="comment.user.username"
        />
      </Link>
    </div>

    <div class="flex-1">
      <div>
        <h2 class="text-lg font-semibold underline">
          <Link :href="route('profiles.show', comment.user.username)">{{
            comment.user.username
          }}</Link>
        </h2>
        <p class="bg-gray-100 rounded mt-3 px-3 py-2">
          {{ comment.body }}
        </p>
      </div>
      <div class="flex items-end my-3">
        <div>
          <span class="text-sm italic">{{ comment.timeAgo }}</span>
        </div>
        <div class="flex ml-3">
          <!-- <like :item="comment" :method="submitLike"></like>
          <dislike
            :item="comment"
            :method="submitDislike"
            class="ml-2"
          ></dislike> -->

          <span>Like</span>
          <span class="ml-2">Dislike</span>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  props: ["comment", 'timeAgo'],

  components: {
      Link,
  }
};
</script>
