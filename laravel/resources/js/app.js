import './bootstrap'
import Vue from 'vue'
import ProductLike from './components/ProductLike'
import ProductTagsInput from './components/ProductTagsInput'

new Vue({
    el: '#app',
    components: {
        ProductLike,
        ProductTagsInput,
    }
})