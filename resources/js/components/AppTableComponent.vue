<template>
    <div class="tablebox">
        <table>
            <thead>
                <slot name="head"></slot>
            </thead>
            <tbody>
                <slot></slot>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
.tablebox {
    overflow-y: auto;
    height: 80vh;
}

table {
    min-width: 100%;
    border-radius: .2rem;
}
</style>