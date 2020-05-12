<template>
    <div>
        <ul v-for="nameTag in tagNameJson">
            <li>
                {{ nameTag }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        tagNamesData: {
            type: Array,
        }
    },
    data() {
        return {
           
        }
    },
    computed: {
        tagNameJson() {
            return JSON.stringify(this.tagNamesData)
        },
    },
}
</script>