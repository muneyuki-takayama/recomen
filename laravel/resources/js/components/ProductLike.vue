<template>
    <div>
        <button 
        type="button"
        >
        <i 
        class="fab fa-ello"
        :class="{'smile-red': this.isLikedBy, 'smile-animated': this.gotToLike}"
        @click="clickLike"
        >
            </i>
        </button>
        {{ countLikes }}
    </div>
</template>

<script>
export default {
    props: {
        initialIsLikedBy: {
            type: Boolean,
            default: false,
        },
        initialCountLikes: {
            type: Number,
            default: 0,
        },
        authorized: {
            type: Boolean,
            default: false,
        },
        endpoint: {
            type: String,
        },
    },
    data() {
        return {
            isLikedBy: this.initialIsLikedBy,
            countLikes: this.initialCountLikes,
            gotToLike: false,
        }
    },
    methods: {
        clickLike() {
            if(!this.authorized) {
                alert('いいね機能はログイン中のみ使用できます。')
                return
            }

            this.isLikedBy
            ? this.unlike()
            : this.like()
        },

        async like() {
            const response = await axios.put(this.endpoint)

            this.isLikedBy = true
            this.countLikes = response.data.countLikes
            this.gotToLike = true
        },
        async unlike() {
            const response = await axios.delete(this.endpoint)

            this.isLikedBy = false
            this.countLikes = response.data.countLikes
            this.gotToLike = false
        },

    },

    
}
</script>

<style scoped>
    i.fab.fa-ello.smile-red {
        color: #ff4500;
    }
    
    @keyframes smileAnimation {
        0% {
            transform: scale(0.5);
        }
        10% {
            transform: scale(0.7);
        }
        30% {
            transform: scale(0.9);
        }
        50% {
            transform: scale(1.2);
        }
        80% {
            transform: scale(1.5);
        }
        100% {
            transform: scale(1.0);
        }
        }

    i.fab.fa-ello.smile-animated{
        animation: smileAnimation .2s;
    }

</style>