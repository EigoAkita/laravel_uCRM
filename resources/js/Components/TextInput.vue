<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue']);

// イベントの名前
defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <!-- @inputはjsのイベント -->
    <!-- 文字を入力した段階で$emitメソッドが発火 -->
    <!-- $emit(カスタムイベント名, 渡したい値（入力した文字）) -->
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
