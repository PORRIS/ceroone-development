<template>
    <button :type="type" class="rounded-lg border border-transparent bg-yellow-400 px-4 py-2 text-center text-sm font-medium leading-5 text-gray-900 transition-colors duration-150 hover:bg-amber-500 focus:outline-none focus:ring active:bg-amber-500">
        <slot/>
    </button>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>
