import './bootstrap'
import Vue from 'vue'
import ProductLike from './components/ProductLike'
import ProductTagsInput from './components/ProductTagsInput'
import FollowButton from './components/FollowButton'

new Vue({
    el: '#app',
    components: {
        ProductLike,
        ProductTagsInput,
        FollowButton,
    }
})