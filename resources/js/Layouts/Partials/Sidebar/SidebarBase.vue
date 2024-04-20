<template>
    <div id="app">
        <!--Sidebar with Dimmer -->
        <div class="fixed top-0 flex z-40" :class="right ? 'right-0' : ''">
            <!-- Sidebar -->
            <div
                class="absolute flex top-0 h-screen z-20"
                :class="[
                    right ? 'right-0 flex-row' : 'left-0 flex-row-reverse',
                ]"
            >
                <!--Drawer -->
                <button
                    @click.prevent="toggle()"
                    class="w-5 h-48 p-1 my-auto rounded text-white bg-gray-600 text-center focus:outline-none hover:bg-gray-500 transition-color duration-300"
                >
                    <Icon
                        :icon="
                            open
                                ? 'fluent-emoji-high-contrast:minus'
                                : 'fluent-mdl2:circle-addition-solid'
                        "
                        color="white"
                    />
                </button>

                <!-- Sidebar Content -->
                <div
                    ref="content"
                    class="transition-all duration-700 bg-slate-900 overflow-hidden flex justify-center"
                    :class="[open ? 'max-w-lg' : 'max-w-0']"
                >
                    <slot class="w-44"></slot>
                </div>
            </div>

            <transition name="fade">
                <!-- Dimmer -->
                <div
                    v-if="dimmer && open"
                    @click="toggle()"
                    class="flex-1 bg-gray-400 bg-opacity-75 active:outline-none z-10"
                />
            </transition>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Icon } from "@iconify/vue";

const props = defineProps({ right: Boolean, show: Boolean });
const dimmer = ref();

const open = ref(false);

const toggle = () => {
    open.value = !open.value;
};

if (props.show) {
    open.value = true;
}
</script>

<style lang="scss" scoped></style>
