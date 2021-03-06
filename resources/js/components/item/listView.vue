<template>
    <div>
        <div v-for="(item,index) in items" :key="index">
            <list-item
                :item="item"
                class="item"
                @itemChanged="$emit('reloadList')"
            ></list-item>
        </div>
    </div>
</template>
<script>

import listItem from './listItem';

export default {
    props: ['items'],
    components: {
        listItem
    },
    data() {
        return {
            message: 'Hello World'
        }
    }
};
</script>
<style scoped>
.item{
    background: #e6e6e6;
    padding: 5px;
    margin-bottom: 2px;
}
</style>
