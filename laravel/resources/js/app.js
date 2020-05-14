import './bootstrap'
import Vue from 'vue'
import ProductLike from './components/ProductLike'
import ProductTagsInput from './components/ProductTagsInput'
import FollowButton from './components/FollowButton'
import TagSearch from './components/TagSearch'
import ImgView from './components/ImgView'

new Vue({
    el: '#app',
    components: {
        ProductLike,
        ProductTagsInput,
        FollowButton,
        TagSearch,
        ImgView,
    }
})