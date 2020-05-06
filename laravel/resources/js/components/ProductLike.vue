<template>
    <div>
        <button 
        type="button"
        >
        <i 
        class="fab fa-ello"
        :class="{'smile-red': this.isLikedBy}"
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
        }
    },
    data() {
        return {
            isLikedBy: this.initialIsLikedBy,
            countLikes: this.initialCountLikes,
        }
    }
    
}
</script>

<style scoped>
    i.fab.fa-ello.smile-red {
        color: #ff4500;
    }
</style>