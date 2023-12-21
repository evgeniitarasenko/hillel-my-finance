<template>
    <div class="settings">
        <div class="header">
            <h2 class="title">Settings</h2>

            <div class="account-box">
                <div class="avatar">M</div>
                <div class="contacts">
                    <div class="name">Evgenii Tarasenko</div>
                    <div class="email">evgenii.tarasenko@gmail.com</div>
                </div>
            </div>
        </div>

        <div class="settings-list">
            <div class="settings-item">
                <div class="title">
                    <font-awesome-icon icon="user"/>
                    Manage Account
                </div>

                <div class="icon">
                    <font-awesome-icon icon="angle-right"/>
                </div>
            </div>

            <div class="settings-item">
                <div class="title">
                    <font-awesome-icon icon="tag"/>
                    Manage Categories
                </div>

                <div class="icon">
                    <font-awesome-icon icon="angle-right"/>
                </div>
            </div>

            <div class="settings-item">
                <div class="title">
                    <font-awesome-icon icon="question"/>
                    Frequently asked questions
                </div>

                <div class="icon">
                    <font-awesome-icon icon="angle-right"/>
                </div>
            </div>

            <div class="settings-item">
                <div class="title">
                    <font-awesome-icon icon="right-from-bracket"/>
                    Logout
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {}
    },
}
</script>