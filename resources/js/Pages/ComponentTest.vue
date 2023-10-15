<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'

// const emitTest = (e) => {
//     console.log(e)
// }

// 上記のコードを以下の様に省略可能
// 引数が一つの場合、外側の（）は必要無し
// 処理が一つの場合、外側の {} は必要無し
const emitTest = e => console.log(e)

</script>

<template>
    <GuestLayout>
        <InputLabel value="件名">タイトル</InputLabel>
        <TextInput
        modelValue="初期値が入ります"
        @update:modelValue="emitTest"
        >

        </TextInput>
    </GuestLayout>
</template>