<template>
    <div id="popup">
        <div class="popup-inner">
            <slot />

            <button>Confirm</button>
            <button class="popup-close"  @click="TogglePopup()">Close</button>
        </div>
    </div>
</template>

<script>
export default ({
    props: ['TogglePopup']
})
</script>


<style>
   @import url("../../css/popup.css");
</style>