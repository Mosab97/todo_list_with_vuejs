<template>
    <div class="toDoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-item-form
            />
        </div>
        <list-view
            :items="items"
            @reloadList="getList"
        ></list-view>
    </div>
</template>
<script>

import addItemForm from "../components/item/addItemForm";
import listView from "../components/item/listView";

export default {

    components: {
        addItemForm,
        listView,
    },
    data() {
        return {
            items: []
        }
    },
    methods: {
        getList() {
            axios.get('api/item').then(response => {
                this.items = response.data;
            }).catch(error => {
                console.log(error);
            });
        }
    },
    created() {
        this.getList();
    }

};
</script>

<style scoped>
.toDoListContainer {
    width: 350px;
    margin: auto;
}

.heading {
    background: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}
</style>
