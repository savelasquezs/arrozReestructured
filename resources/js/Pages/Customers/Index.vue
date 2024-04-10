<template>
    <div class="max-w-7xl mx-auto">
        <ul role="list" class="grid grid-cols-2 gap-4 divide-gray-100">
            <li
                class="flex justify-between gap-x-6 py-5 px-2 shadow bg-gray-200 rounded-md"
                v-for="customer in customers"
            >
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p
                            class="text-sm font-semibold leading-6 text-gray-900"
                        >
                            {{ customer.name }}
                        </p>
                        <p
                            class="mt-1 truncate text-xs leading-5 text-gray-500"
                            v-for="address in customer.addresses"
                        >
                            {{ address.address }} --{{
                                address.neighborhood.name
                            }}
                        </p>
                    </div>
                </div>
                <div
                    class="hidden shrink-0 sm:flex sm:flex-col sm:items-end gap-2"
                >
                    <div>
                        <p
                            class="text-sm leading-6 text-gray-900"
                            v-for="phone in customer.phones"
                        >
                            {{ phone.number }}
                        </p>
                    </div>
                    <p class="mt-1 text-xs leading-5 text-gray-500">
                        Last seen
                        <time datetime="2023-01-23T13:23Z">3h ago</time>
                    </p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
defineProps({ customers: Array });
</script>

<style lang="scss" scoped></style>
