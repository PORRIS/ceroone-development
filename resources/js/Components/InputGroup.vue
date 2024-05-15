<template xmlns="http://www.w3.org/1999/html">
    <div class="relative text-gray-500 focus-within:text-amber-600 dark:focus-within:text-amber-400">
        <input class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-950 dark:border-b-blue-900 dark:bg-gray-50 focus:border-amber-500 focus:outline-none focus:shadow-outline-amber dark:focus:shadow-outline-amber form-input"
               :placeholder="text" :value="modelValue"
               :type="type" :required="required" :accept="accept"
               @input="$emit('update:modelValue', $event.target.value)" ref="input">
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <slot/>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue','text','type','required','accept']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>
