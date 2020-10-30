
                            <div class="modal fade" id="exampleModal_<?php echo $id ;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog filter-popup modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Advance Filter Option</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body filter">
                                <div class="row">
                                  <div class="col-md-4 mb-4">
                                    <label>Sexology</label><br>
                                    <?php echo e(Form::checkbox('sex[]','Hetero')); ?>Hetero <br>
                                    <?php echo e(Form::checkbox('sex[]','Homo')); ?>Homo <br>
                                    <?php echo e(Form::checkbox('sex[]','Bisexual')); ?>Bisexual 
                                  </div>
                                  <div class="col-md-4 mb-4">
                                      <label>Tits size</label><br>
                                    <?php echo e(Form::checkbox('tits[]','Small')); ?>Small <br>
                                    <?php echo e(Form::checkbox('tits[]','Normal')); ?>Normal <br>
                                    <?php echo e(Form::checkbox('tits[]','Big')); ?>Big 
                                  </div>
                                   <div class="col-md-4 mb-4">
                                    <label>Ass</label><br>
                                    <?php echo e(Form::checkbox('ass[]','Normal')); ?>Normal <br>
                                    <?php echo e(Form::checkbox('ass[]','Small')); ?>Small <br>
                                    <?php echo e(Form::checkbox('ass[]','Big')); ?>Big 
                                  </div>
                                  <div class="col-md-4 mb-4">
                                      <label>Privy part</label><br>
                                    <?php echo e(Form::checkbox('privy[]','Shaved')); ?>Shaved <br>
                                    <?php echo e(Form::checkbox('privy[]','Unshaved')); ?>Unshaved <br>
                                              <br>
                                              <br>
                                      <label>Height</label><br>
                                    <?php echo e(Form::checkbox('height[]','<140cm')); ?><140cm <br>
                                    <?php echo e(Form::checkbox('height[]','140-160cm')); ?>140-160cm <br>
                                    <?php echo e(Form::checkbox('height[]','160-180cm')); ?>160-180cm <br>
                                    <?php echo e(Form::checkbox('height[]','180cm<')); ?>180cm< <br>
                                  </div>
                                   <div class="col-md-4 mb-4">
                                    <label>Eye color</label><br>
                                    <?php echo e(Form::checkbox('eyecolor[]','blue')); ?>Blue <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','brown')); ?>Brown <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','brown-green')); ?>Brown-green<br> 
                                    <?php echo e(Form::checkbox('eyecolor[]','golden')); ?>Golden <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','gray')); ?>Gray <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','green')); ?>Green<br>
                                    <?php echo e(Form::checkbox('eyecolor[]','red')); ?>Red <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','white')); ?>White <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','yellow')); ?>Yellow <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','blue')); ?>Blue <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','indigo')); ?>Indigo <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','violet')); ?>Violet <br>
                                  </div>
                                        <div class="col-md-4 mb-4">
                                    <label>Hair color</label><br>
                                    <?php echo e(Form::checkbox('haircolor[]','blue')); ?>Blue <br>
                                    <?php echo e(Form::checkbox('haircolor[]','brown')); ?>Brown <br>
                                    <?php echo e(Form::checkbox('haircolor[]','black')); ?>Black<br> 
                                    <?php echo e(Form::checkbox('haircolor[]','blonde')); ?>Blonde <br>
                                    <?php echo e(Form::checkbox('haircolor[]','gray')); ?>Gray <br>
                                    <?php echo e(Form::checkbox('haircolor[]','green')); ?>Green<br>
                                    <?php echo e(Form::checkbox('haircolor[]','red')); ?>Red <br>
                                    <?php echo e(Form::checkbox('haircolor[]','white')); ?>White <br>
                                    <?php echo e(Form::checkbox('haircolor[]','yellow')); ?>Yellow <br>
                                    <?php echo e(Form::checkbox('haircolor[]','silver')); ?>Silver <br>
                                    <?php echo e(Form::checkbox('haircolor[]','blue')); ?>Blue <br>
                                    <?php echo e(Form::checkbox('haircolor[]','indigo')); ?>Indigo <br>
                                    <?php echo e(Form::checkbox('haircolor[]','violet')); ?>Violet <br>
                                  </div>
                                 
                                   <div class="col-md-4 mb-4">
                                      <label>Hair Length</label><br>
                                    <?php echo e(Form::checkbox('hairlength[]','Very short')); ?>Very short <br>
                                    <?php echo e(Form::checkbox('height[]','Short')); ?>Short <br>
                                    <?php echo e(Form::checkbox('height[]','Long')); ?>Long <br>
                                    <?php echo e(Form::checkbox('height[]','Very Long')); ?>Very Long <br>
                                  </div>
                                   <div class="col-md-4 mb-4">
                                    <label>Weight</label><br>
                                    <?php echo e(Form::checkbox('weight[]','Less than Average')); ?>Less than Average <br>
                                    <?php echo e(Form::checkbox('weight[]','Normal')); ?>Normal <br>
                                    <?php echo e(Form::checkbox('weight[]','Muscular')); ?>Muscular<br> 
                                    <?php echo e(Form::checkbox('weight[]','Above Average')); ?>Above Average 
                                  </div>
                                  <div class="col-md-4 mb-4">
                                      <label>Age</label><br>
                                    <?php echo e(Form::checkbox('age[]','18-24')); ?>18-24 <br>
                                    <?php echo e(Form::checkbox('age[]','25-34')); ?>25-34<br>
                                    <?php echo e(Form::checkbox('age[]','35-44')); ?>35-44<br>
                                    <?php echo e(Form::checkbox('age[]','45 +')); ?>45 +
 
                                  </div>
                                </div>
                            </div>

                          </div>
                        </div>
                      </div>

<?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/popup.blade.php ENDPATH**/ ?>