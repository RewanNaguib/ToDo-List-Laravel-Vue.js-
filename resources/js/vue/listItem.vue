<template>
<div class="item">
    
    <input 
       type="checkbox"
       @change="updateCheck()"
       v-model="item.completed"
       />

       <span :class="[item.completed ? 'completed' : '' ,'itemText']">  {{item.name}}  </span>
       <button @click="removeItem()" class="trashcan">
           <font-awesome-icon icon="trash" />
       </button>

</div>
</template>




 <script>
 export default {
     props: ['item'],

     methods: {
         updateCheck() {
                axios.put('api/items/' + this.item.id ,{
                 item:this.item
             })

             .then(response =>{
                 if(response.status == 200) {
                     this.$emit('itemchanged');
                 }
             })
             .catch(error => {
                 console.log(error);
             })
         },
 
        removeItem() {
                axios.delete('api/items/' + this.item.id)
                .then(response =>{
                 if(response.status == 200) {
                     this.$emit('itemchanged');
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
 .completed {
     text-decoration: line-through;
     color: #001e3d;
 }

 .itemText {
     width:100%;
     margin-left: 20px;
     
 }

 .item {
     display: flex;
     justify-content: center;
     align-items: center;
 }

 .trashcan {
     background: #ff2850;
     border: none;
     color: white;
     outline: none;
 }




 </style>