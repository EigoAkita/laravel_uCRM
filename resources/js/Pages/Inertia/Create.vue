<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";

defineProps({
  errors: Object,
});

// 以下の様にする事で、form.titleやform.contentなどで中身の参照が可能
const form = reactive({
  title: null,
  content: null,
});

const submitFunction = () => {
  //　以下の様にする事で、formオブジェクトのデータを渡す事が可能
  Inertia.post("/inertia", form);
};
</script>

<template>
  <BreezeValidationErrors :errors="errors" />
  <!-- ページ読込防止の為（パフォーマンス低下の為）@submitにpreventを付与 -->
  <form @submit.prevent="submitFunction">
    <input type="text" name="title" v-model="form.title" /><br />
    <div v-if="errors.title">{{ errors.title }}</div>
    <input type="text" name="content" v-model="form.content" />
    <div v-if="errors.content">{{ errors.content }}</div>
    <button>送信</button>
  </form>
</template>
