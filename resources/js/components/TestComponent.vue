<template>
<div>
    <h2>{{ lodash }} </h2>
</div>
</template>

<script>
export default {
    created() {
        this.lodash();
    },

    data() {
        return {
            lodash:"",
        };
    },

    method :{
        lodash() {
            let array = _.chunk(['a' , 'b' , 'c' , 'd' , 'e' , 'f'], 2);
            this.lodash = array;
        },
    },
}
</script>

<style>

</style>

