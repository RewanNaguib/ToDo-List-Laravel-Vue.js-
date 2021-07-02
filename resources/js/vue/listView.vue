<template>
 <div>
    <div v-for="(item,index) in items" :key="index" >
        
        <list-item
           :item="item"
           class="item"
           v-on:itemchanged="$emit('reloadlist')"
           />
         
          
  </div>
 </div>
</template>



 <script>
 import listItem from "./listItem"

 export default {
     props: ['items'],
     components:{
         listItem
     }
 }
 </script>



 <style scoped>
 @import url('https://fonts.googleapis.com/css2?family=Kalam&display=swap');
 .item {
     background-color: #ff2850;
     border-radius:50px;
     outline: none;
     padding:5px;
     margin-right:10px;
     margin-left:10px;
     margin-top: 10px;
     margin-bottom: 10px;
     font-family: 'Kalam', cursive;
     color: white;
 }

 </style>