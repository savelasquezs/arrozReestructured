<template>
    <div>Holis</div>
    <SidebarBase>
        <ul class="space-y-2 font-medium min-w-44">
            <ItemSidebar
                href="/ventas"
                name="Ventas"
                icon_name="ph:cash-register"
            />

            <ItemSidebar
                href="/gastos"
                name="Gastos"
                icon_name="mingcute:receive-money-fill"
            />
        </ul>
    </SidebarBase>
</template>

<script setup>
import ItemSidebar from "./ItemSidebar.vue";
import SidebarBase from "./SidebarBase.vue";
</script>

<style lang="scss" scoped></style>
