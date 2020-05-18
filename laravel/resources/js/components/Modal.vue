<template>
    <div>
        <button @click.prevent="openModal">Delete</button>

        <div id="overlay" v-show="showContent" @click="closeModal">
            <div id="content" @click="stopEvent">
                <p>本当に{{deleteDataName}}を削除しますか？</p>
                <button @click.prevent="closeModal">Cancel</button>
                <button type="submit">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        deleteDataName: {
            type: String,
        }
    },
    data() {
        return {
            showContent: false
        }
    },
    methods: {
        openModal() {
            this.showContent = true
        },
        closeModal() {
            this.showContent = false
        },
        stopEvent() {
            event.stopPropagation()
        },
    },
}
</script>

<style scoped>
    #overlay {
        z-index: 1;
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #content {
        z-index:2;
        width:50%;
        padding: 1em;
        background:#fff;
    }
</style>