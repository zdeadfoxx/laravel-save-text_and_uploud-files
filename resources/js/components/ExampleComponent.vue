<template>
    <div class="container">
        <div class="progress" v-if="FileProgress">
            <div class="progress-bar" role="progressbar" :style="{width: FileProgress +'%'}">{{ FileCurrent }}%</div>
    </div>
        <div class="row" v-for="(downloads,index) in downloads">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Componebbbbnt</div>
                    <div class="card-body">
                       <template v-if="downloads.id">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Выбирай файл</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" @change="FileInputChange(downloads)">
                            </div>
                            <button type="submit" @change="UploudFile(downloads)">Загрузка</button>
                            <button type="submit" @change="DeleteFile(index)" >Удалить </button>
                        </form>
                       </template>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" @change="AddFile" >Добавить файл</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data (){
        return {
            downloads:[],
            FileProgress:0,
            FileCurrent:'',
        }
      },
      props:['files'],
      mounted (){
        this.downloads = this.files;
      },
      methods: {
        AddFile(){
            this.downloads.push({id:0, title:'', file: []})
        },
        DeleteFile (index){
                if(this.downloads[index].id){
                    this.downloads.splice(index,1);
                }

            axios.delete('/download/ ' + this.downloads[index].id)
            .then(Response =>{
                if(Response.data.result){
                    this.downloads.slice(index,1)
                }
            });
        },
        FileInputChange (download){
            download.file = event.target.files[0];
        },
       async UploudFile (download){

        let Form =  new FormData();
        Form.append('file', download.file);

        await axios.post('/download', form,{
            onUploudProgress: (itemUpload) =>{
                this.FileProgress = Math.round((itemUpload.loaded / itemUpload.total) *100);
                this.FileCurrent = download.file.name + '' + this.FileProgress;
            }
        })
        then(Response=>{
            download.id = Response.data;
            download.id = false;
        })
        .catch(error =>{
            console.log(error);
        });
        this.FileProgress = 0;
        this.FileCurrent = '';
    }
    }
 }
</script>
