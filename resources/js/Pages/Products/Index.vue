<template>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/riva-dashboard-tailwind/riva-dashboard.css"
    />
    <div class="flex flex-wrap -mx-3 mb-5">
        <div class="w-full max-w-full px-3 mb-6 mx-auto">
            <div
                class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white m-5"
            >
                <div
                    class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30"
                >
                    <div class="flex-auto block py-8 pt-6 px-9">
                        <div class="overflow-x-auto">
                            <table
                                class="w-full my-0 align-middle text-dark border-neutral-200"
                            >
                                <thead class="align-bottom">
                                    <tr
                                        class="font-semibold text-[0.95rem] text-secondary-dark"
                                    >
                                        <th
                                            class="pb-3 text-start min-w-[175px]"
                                        >
                                            PRODUCT NAME
                                        </th>
                                        <th class="pb-3 text-end min-w-[100px]">
                                            PRICE
                                        </th>
                                        <th
                                            class="pb-3 pr-12 text-end min-w-[175px]"
                                        >
                                            CATEGORY
                                        </th>
                                        <th
                                            class="pb-3 pr-12 text-end min-w-[100px]"
                                        >
                                            DEADLINE
                                        </th>
                                        <th class="pb-3 text-end min-w-[50px]">
                                            DETAILS
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(
                                            product, index
                                        ) in products.data"
                                        :key="index"
                                        class="border-b border-dashed last:border-b-0"
                                    >
                                        <td class="p-3 pl-0">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex flex-col justify-start"
                                                >
                                                    <a
                                                        href="javascript:void(0)"
                                                        class="capitalize mb-1 font-semibold transition-colors duration-200 ease-in-out text-lg/normal text-secondary-inverse hover:text-primary"
                                                    >
                                                        {{ product.name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="p-3 pr-0 text-end">
                                            <span
                                                class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="w-5 h-5 mr-1"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"
                                                    />
                                                </svg>
                                                {{ product.price }}
                                            </span>
                                        </td>
                                        <td class="p-3 pr-12 text-end">
                                            <span
                                                class="text-center align-baseline inline-flex px-4 py-3 mr-auto items-center font-semibold text-[.95rem] leading-none text-primary bg-primary-light rounded-lg"
                                            >
                                                {{ product.category }}
                                            </span>
                                        </td>
                                        <td class="pr-0 text-start">
                                            <span
                                                class="font-semibold text-light-inverse text-md/normal"
                                                >2023-08-23</span
                                            >
                                        </td>
                                        <td class="p-3 pr-0 text-end">
                                            <button
                                                class="ml-auto relative text-secondary-dark bg-light-dark hover:text-primary flex items-center h-[25px] w-[25px] text-base font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-200 ease-in-out shadow-none border-0 justify-center"
                                            >
                                                <span
                                                    class="flex items-center justify-center p-0 m-0 leading-none shrink-0"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="w-4 h-4"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M8.25 4.5l7.5 7.5-7.5 7.5"
                                                        />
                                                    </svg>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({ products: Object });

console.log(props.products);
</script>

<style lang="scss" scoped></style>
