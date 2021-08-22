<template>
  <div class="flex border-t border-gray-400 mt-5 py-5 space-x-5">
    <div class="flex-shrink-0">
      <inertia-link :href="route('profiles.show', post.user.username)">
        <img
          class="h-8 w-8 rounded-full object-cover"
          :src="post.user.profile_photo_url"
          :alt="post.user.username"
        />
      </inertia-link>
    </div>

    <div class="flex-1">
      <div>
        <div class="flex justify-between">
          <h2 class="text-lg font-semibold underline">
            <inertia-link :href="route('profiles.show', post.user.username)">{{
              post.user.username
            }}</inertia-link>
          </h2>

          <div class="relative">
            <button
              type="button"
              class="focus:outline-none"
              @click="openMenu = !openMenu"
            >
              <icon name="ellipsis-h" class="w-6 h-6 fill-current"></icon>
            </button>
            <div
              v-if="openMenu"
              class="
                bg-gray-300
                text-sm
                absolute
                w-48
                right-0
                text-black
                shadow-lg
                rounded-md
                px-4
                py-2
                hover:bg-gray-600
                hover:text-red-500
                transition
                duration-150
                ease-in-out
              "
            >
              <form @submit.prevent="deletePost">
                <button
                  type="submit"
                  class="
                    flex
                    justify-between
                    items-center
                    w-full
                    focus:outline-none
                  "
                >
                  Delete Post
                  <icon name="trash" class="w-3 h-3 fill-current"></icon>
                </button>


              </form>

              <!-- <form @submit.prevent="sharePost">
                  <button
                  type="submit"
                  class="
                    flex
                    justify-between
                    items-center
                    w-full
                    focus:outline-none
                  "
                >
                  Share
                  <icon name="share" class="w-3 h-3 fill-current"></icon>
                </button>
              </form> -->



            </div>
          </div>
        </div>
        <p class="bg-gray-100 rounded mt-3 px-3 py-2">
          {{ post.body }}
        </p>
      </div>

      <div class="flex items-end my-3">
        <div>
          <!-- <span class="text-sm italic">{{ post.timeAgo }}</span> -->
          <span class="text-sm italic">3 days ago</span>
        </div>

        <div class="flex ml-3">
          <span>Like</span>
          <span class="ml-2">Dislike</span>

          <!-- <like :item="post" :method="submitLike"></like>
          <dislike :item="post" :method="submitDislike" class="ml-2"></dislike> -->
        </div>
      </div>

      <post-form :method="submit" :form="form" :text="'Comment'"></post-form>

      <combined-comments :comments="post.comments"></combined-comments>
    </div>
  </div>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
  props: ["post"],

  components: {
    Link,
  },

  data() {
    return {
      openMenu: false,
      deleteForm: this.$inertia.form({
          userPost: this.post
      })
    };
  },

  methods: {
      deletePost() {
          this.openMenu = false
          this.deleteForm.delete(this.route('posts.destroy', this.post), {
              preserveScroll: true,
              onError: () => {
                  Toast.fire({
                      icon: 'error',
                      title: 'You cannot delete this post!'
                  })
              },
              onSuccess: () => {
                  Toast.fire({
                      icon: 'success',
                      title: 'Post has successfully been deleted!'
                  })
              }
          })
      }
  }
};
</script>
