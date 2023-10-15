<script setup>
import { Inertia } from '@inertiajs/inertia';

defineProps({
    id: String,
    blog: Object
})

// アロー関数で引数が一つの場合、（）は省略可能
// 以下の場合は、idの外側の（）が省略されています
const deleteConfirm = id => {
    // console.log(id)

    Inertia.delete(`/inertia/${id}`, {
        onBefore: () => confirm('本当に削除しますか？')
    })
}

</script>

<template>
    {{ id }}<br>
    {{ blog.title }}<br>
    <button @click="deleteConfirm(blog.id)">削除</button>
</template>