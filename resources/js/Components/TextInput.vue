<script setup>
import { onMounted, ref } from "vue";

defineProps({
    modelValue: [String, Number],
    title: String,
    type: String,
    disabled: Boolean,
});

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div class="my-2">
        <label :for="modelValue" class="block text-xs font-medium text-white/60"
            >{{ title }}:</label
        >
        <input
            class="text-xs border rounded-lg block w-full p-2.5 bg-slate-900 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
            ref="input"
            :value="modelValue"
            :name="modelValue"
            :type="type"
            :disabled="disabled"
            @input="$emit('update:modelValue', $event.target.value)"
        />
    </div>
</template>
