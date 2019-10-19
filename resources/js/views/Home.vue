<template>
    <div style="margin: 20px;">
        <div class="action-section" style="margin-bottom: 30px;">
            <el-button type="primary" icon="el-icon-plus" @click="toggleCreateIssue">Issue</el-button>
            <el-button type="success" icon="el-icon-plus" @click="toggleCreateTag">Tag</el-button>
            <el-button type="warning" icon="el-icon-plus" @click="toggleCreateCategory">Category</el-button>
        </div>
        <el-table :data="tableData.filter(data => !search || data.title.toLowerCase().includes(search.toLowerCase()))"
            style="width: 100%" height="350">
            <el-table-column label="Category" sortable width="220">
                <el-tag>Tag 1</el-tag>
                <el-tag>Tag 2</el-tag>
            </el-table-column>
            <el-table-column prop="title" label="Title" sortable>
            </el-table-column>
            <el-table-column prop="keyword" width="250">
                <template slot="header" slot-scope="scope">
                    <el-input v-model="search" size="medium" placeholder="Type to search" clearable />
                </template>
            </el-table-column>
            <el-table-column prop="action" width="200">
                <el-button type="info">Detail</el-button>
            </el-table-column>
        </el-table>

        <el-dialog title="New Issue" :visible.sync="issueModalOpen" width="80%">
            <div>
                <el-input v-model="issue_form.title" placeholder="Title"></el-input>
                
            </div>
            <span slot="footer" class="dialog-footer">
                <el-button @click="issueModalOpen = false">Cancel</el-button>
                <el-button type="primary" @click="issueModalOpen = false">Confirm</el-button>
            </span>
        </el-dialog>
        <el-dialog title="New Tag" :visible.sync="tagModalOpen" width="80%">
            <div style="display: flex; justify-content: start;">
                <el-input placeholder="Tag name" v-model="tag"></el-input>
                <el-button type="success" @click="addTag" :disabled="tagDisable">Add</el-button>
            </div>
        </el-dialog>
        <el-dialog title="New Category" :visible.sync="categoryModalOpen" width="80%">
            <div style="display: flex; justify-content: start;">
                <el-input placeholder="Category name" v-model="category"></el-input>
                <el-button type="success" @click="addCategory">Add</el-button>
            </div>
        </el-dialog>
    </div>
</template>
<script>
    import issueApi from '@/api/issue'
    import categoryApi from '@/api/category'
    import tagApi from '@/api/tag'
    export default {
        data() {
            return {
                issue_form: {
                    tags: [],
                    category: [],
                    title: '',
                    os: '',
                    description: ''
                },
                os: [
                    'window', 'macos', 'linux', 'other'
                ],
                tagDisable: false,
                tag: '',
                tags: [],
                category: '',
                categories: [],
                issueModalOpen: false,
                tagModalOpen: false,
                categoryModalOpen: false,
                search: '',
                dataFilter: [],
                tableData: [{
                        category: 'Window',
                        title: 'Tom',
                        keyword: 'No. 189, Grove St, Los Angeles'
                    },
                    {
                        category: '2016-05-03',
                        title: 'John',
                        keyword: 'No. 189, Grove St, Los Angeles'
                    },
                    {
                        category: '2016-05-03',
                        title: 'Julie',
                        keyword: 'No. 189, Grove St, Los Angeles'
                    },
                    {
                        category: '2016-05-03',
                        title: 'Tom',
                        keyword: 'No. 189, Grove St, Los Angeles'
                    },
                ]
            }
        },
        methods: {
            addTag() {
                if (this.tags.filter(data => data.name.toLowerCase() === this.tag.toLowerCase()).length > 0) {
                    this.$notify.error({
                        message: 'Tag exists'
                    })
                } else {
                    tagApi.store({
                            name: this.tag.toLowerCase()
                        },
                        response => {
                            this.tag = ''
                            if (response.data.status == false) {
                                _.forEach(response.data.message, e => {
                                    this.$notify({
                                        message: e[0],
                                        type: 'error',
                                        duration: 0
                                    });
                                })
                            } else {
                                this.$notify({
                                    message: response.data.message,
                                    type: 'success'
                                });
                            }

                        },
                        error => {
                            this.$notify({
                                message: response.data.message,
                                type: 'warning'
                            });
                        })
                }
            },
            addCategory() {
                categoryApi.store({
                    name: this.category.toLowerCase()
                }, response => {
                    this.category = ''
                    if (response.data.status == false) {
                        _.forEach(response.data.message, e => {
                            this.$notify({
                                message: e[0],
                                type: 'error',
                                duration: 0
                            });
                        })
                    } else {
                        this.$notify({
                            message: response.data.message,
                            type: 'success'
                        });
                    }
                }, error => {
                    this.$notify({
                        message: error.data.message,
                        type: 'warning',
                        duration: 0
                    })
                })
            },
            toggleCreateIssue() {
                this.issueModalOpen = !this.issueModalOpen
            },
            toggleCreateTag() {
                this.tagModalOpen = !this.tagModalOpen
            },
            toggleCreateCategory() {
                this.categoryModalOpen = !this.categoryModalOpen
            }
        },
        beforeMount() {
            tagApi.getAll(response => {
                this.tags = response.data
            }, error => {
                this.$notify.error({
                    message: 'Something went wrong!'
                })
            })
        },
        mounted() {
            this.dataFilter = this.tableData
            console.log('Home mounted')
        }
    }

</script>
<style lang="scss">

</style>
