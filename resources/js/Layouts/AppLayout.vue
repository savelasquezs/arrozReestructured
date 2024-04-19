<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";
import SidebarPages from "./Partials/Sidebar/SidebarPages.vue";
import SmallAddButton from "@/Components/SmallAddButton.vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-slate-100 dark:bg-slate-900">
            <div
                class="h-10 bg-slate-700 fixed top-0 right-0 left-0 flex justify-end"
            >
                <Link
                    href="ventas/create"
                    class="rounded-md w-fit text-white p-2 text-xs flex gap-2 items-center"
                >
                    <SmallAddButton />
                    Crear pedido
                </Link>
            </div>
            <SidebarPages />

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
