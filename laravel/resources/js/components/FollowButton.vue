<template>
    <div>
        <button
            class=""
            :class="buttonColor"
            @click="clickFollow"
        >
        <i
        class=""
        :class="buttonIcon"
        >
        </i>
        {{ buttonText }}
        </button>
    </div>
</template>

<script>
export default {
   props: {
      initialIsFollowedBy: {
        type: Boolean,
        default: false,
      },
      authorized :{
          type: Boolean,
          default: false,
      },
      endpoint :{
          type: String,
      },
    },
    data() {
        return {
            isFollowedBy: this.initialIsFollowedBy,
        }
    },
    computed: {
        buttonColor() {
            return this.isFollowedBy
            ? 'still-follow'
            : 'not-follow'
        },
        buttonIcon() {
            return this.isFollowedBy
            ? 'fas fa-user-check'
            : 'fas fa-user-plus'
        },
        buttonText() {
            return this.isFollowedBy
            ? 'フォロー中'
            : 'フォロー'
        },
    },
    methods: {
        clickFollow() {
            if(!this.authorized) {
                alert('フォロー機能はログイン中のみ使用できます')
                return
            }

            this.isFollowedBy
            ? this.unfollow()
            : this.follow()
        },

        async follow() {
            const response = await axios.put(this.endpoint)

            this.isFollowedBy = true
        },
        async unfollow() {
            const response = await axios.delete(this.endpoint)

            this.isFollowedBy = false
        },
    },
}
</script>

<style scoped>
    .still-follow {
        background-color: blue;
        color: white;
    }
    .not-follow {
        background-color: white;
        color: black;
        border: 1px solid #4169e1;
    }
</style>