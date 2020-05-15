<template>
    <label>
        <div>
            <input type="file" id="" :name="picNum" @change="onFileChange"> 
            <i aria-hidden="true" class="fas fa-plus fa-7x"></i>
            <img :src="uploadedImage" alt="" v-show="uploadedImage">
        </div>
    </label>
</template>

<script>
export default {
    props: {
        selectPicFirst: {
            type: String,
        },
        selectPicSecond: {
            type: String,
        },
        selectPicThird: {
            type: String,
        },
        selectUserProf: {
            type: String,
        },
        imgDataFirst: {
            type: String,
        },
        imgDataSecond: {
            type: String,
        },
        imgDataThird: {
            type: String,
        },
        imgDataUserProf: {
            type: String,
        },
    },
    data() {
        return {
            uploadedImage: '',
        }
    },
    mounted() {
        if(this.imgDataFirst) {
            return this.uploadedImage = this.imgDataFirst;
        }else if(this.imgDataSecond){
            return this.uploadedImage = this.imgDataSecond;
        }else if(this.imgDataThird){
            return this.uploadedImage = this.imgDataThird;
        }else{
            return this.uploadedImage = this.imgDataUserProf;
        }
    
    },
    methods: {
        onFileChange(e) {
            let files = e.target.files;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.uploadedImage = e.target.result;
            };

            reader.readAsDataURL(file);
        },
        
     },
    computed: {
           picNum() {
               if(this.selectPicFirst) {
                   return this.selectPicFirst;
               }else if(this.selectPicSecond) {
                   return this.selectPicSecond;
               }else if(this.selectPicThird){
                   return this.selectPicThird;
               }else{
                   return this.selectUserProf;
               }
           }
    },
}
</script>