<template>
<div class="todoListContainer">

<div class="heading">
    <h2 id="title">  Todo  List </h2>
    <add-item-form 
    v-on:reloadlist="getList()"/>
</div>
    <list-view 
      :items="items" 
      v-on:reloadlist="getList()"/>

</div>
</template> 




<script>
import addItemForm from "./addItemForm"
import listView from "./listView"


export default {
    components: {
        addItemForm,
        listView
    },

    data: function () {
        return {
            items: []
       }
    },

    methods: {
    getList () {
       axios.get('api/items')
       .then( response => {
           this.items = response.data
       })
       .catch( error=> {
           console.log(error);
       })

     }
    },
    
    created() {
        this.getList(); 
    }
}
</script>


<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Monoton&display=swap');
.todoListContainer {
    width:500px;
    background: #001e3d;
    margin: auto;
    padding:1rem;
    border-radius: 10px;
}

.heading {
    padding:10px;
}

#title {
 font-family: 'Monoton', cursive; 
 color: white;   
 text-align: center;
}
</style>