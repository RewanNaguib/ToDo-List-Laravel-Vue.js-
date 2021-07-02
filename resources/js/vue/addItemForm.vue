<template>

<div class="addItem"> 
    <input type="text" v-model="item.name" /> 
    <font-awesome-icon 
       icon="plus-square"
       @click="addItem()"
       :class="[item.name? 'active' : 'inactive' , 'plus']"
    />
</div>

</template>



 <script>
 export default {
     data: function() {
         return{
             item: {
                 name:""
             }
         }
     },

     methods: {
         addItem() {
             if(this.item.name=='') {
                 return;
             }

             axios.post('api/items' ,{
                 item:this.item
             })

             .then(response =>{
                 if(response.status == 201) {
                     this.item.name ="";
                     this.$emit('reloadlist');
                 }
             })
             .catch(error => {
                 console.log(error);
             })
         }
     }
 }
 </script>


 <style scoped>
 @import url('https://fonts.googleapis.com/css2?family=Kalam&display=swap');
 .addItem {
     display: flex;
     justify-content: center;
     align-items: center;
 }

 input {
     background-color: white;
     border-radius:50px;
     outline: none;
     padding:5px;
     margin-right:10px;
     width:100%;
     font-family: 'Kalam', cursive;
     color: #ff2850;
 }

 .plus {
     font-size: 20px;
 }

 .active {
     color:#ff2850;
 }

 .inactive {
     color: white;
 }

 </style>