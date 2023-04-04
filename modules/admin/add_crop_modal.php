<!-- Add Crops Prompt -->
<div class="popupError" x-show="show_crops_form" style="display: none">
    <div class="popup-contentError" x-data="add_crop_modal">
        <div class="popup-child1" style="margin-bottom: 5px">
            <div style="display: flex; flex-direction: column;">
                <h1 style="font-weight: bolder">Add Crops</h1>
                <hr>
                <h3 style="color: red" x-text="admin_error_msg"></h3>
                <h3 style="color: green" x-text="admin_success_msg"></h3>
                <div class="row-fluid" style="background-color: white; min-height: 400px; padding:10px;">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="column">
                                    <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 3px 0 10px 0;">
                                        <div class="form-group" >
                                        <label for="crop_name" style="font-weight: bold">Crop:</label>
                                            <input type="text" name="crop_name" id="crop_name" x-ref="register_crop_name" class="form-control input-lg" placeholder="Add Crop Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-success" style="width: 50%" x-ref="submit_crop_button" x-on:click="submit_crop_form">Confirm</button>
                        <hr>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" > 
                                <thead>
                                    <tr>
                                        <th>Crop Name</th>
                                        <th>Availability</th>
                                        <th>Date Created</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-if="crops">
                                        <template x-for="(crop, index) in custom_pagination(crops)" x-on:items-load.window="crops = $event.detail.crops">
                                            <tr style="min-width: 150px; padding: 10px; text-align: center; border: 1px solid #ddd;">
                                                <td ><span x-text="crop.crop_name"></span></td>
                                                <td><span x-text="crop.is_available == 1 ? 'Available' : 'Not Available' "></span></td>
                                                <td><span x-text="crop.date_created"></span></td>
                                                <td>
                                                    <select class="selectD" name="is_available" :id="generate_id(index)" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px" x-on:change="update_program_status(crop.crop_id, document.getElementById(generate_id(index)).value, 'Crops')">
                                                        <option value="" disabled selected hidden> -- </option>
                                                        <option value="1" >Available</option>
                                                        <option value="0" >Not availabe</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_crops(crop.crop_id)">Delete</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </template>
                                </tbody>
                            </table>
                            <div style="display: flex; flex-direction: row; justify-content: space-evenly">
                                <button class="btn btn-success" x-on:click="prevPage" :disabled="pageNumber==0" >Back</button>
                                <button class="btn btn-success" x-on:click="nextPage" :disabled="pageNumber >= pageCount() -1">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_reset">X</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('add_crop_modal', () => ({ 
            // Pagination Javascript
            'search': "",
            'pageNumber': 0,
            'size': 3,
            'total': "",

            custom_pagination(paginate_records) {
                const start = this.pageNumber * this.size,
                end = start + this.size;

                // this.total = this.crops.length;
                this.total = paginate_records.length;
                return this.crops.slice(start, end);
            },

            //Create array of all pages (for loop to display page numbers)
            pages() {
                return Array.from({
                    length: Math.ceil(this.total / this.size),
                });
            },

            //Next Page
            nextPage() {
                this.pageNumber++;
            },

            //Previous Page
            prevPage() {
                this.pageNumber--;
            },

            //Total number of pages
            pageCount() {
                return Math.ceil(this.total / this.size);
            },

            //Return the start range of the paginated results
            startResults() {
                return this.pageNumber * this.size + 1;
            },

            //Return the end range of the paginated results
            endResults() {
                let resultsOnPage = (this.pageNumber + 1) * this.size;

                if (resultsOnPage <= this.total) {
                    return resultsOnPage;
                }

                return this.total;
            },

            //Link to navigate to page
            viewPage(index) {
                this.pageNumber = index;
            },
            generate_id(id){
                return '_' + id;
            }
        }));
    });
</script>