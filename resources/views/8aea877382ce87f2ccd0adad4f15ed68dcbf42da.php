 <div class="row text-left text-white mt-3 red">
                              <div class="col-md-12 mb-4  das">
                                    <h4 class="text-white m-0">Gender</h4><br>
                                    <label><?php echo e(Form::radio('gender[]','Male')); ?>Male</label> <br>
                                    <label><?php echo e(Form::radio('gender[]','Female')); ?>Female</label> <br>
                                    <label> <?php echo e(Form::radio('gender[]','Trans')); ?>Trans </label>
                                  </div>
                                  <div class="col-md-12 mb-4 logy das">
                                    <h4 class="text-white m-0">Sexology</h4><br>
                                    <label><?php echo e(Form::checkbox('sexology[]','Hetero')); ?>Hetero </label><br>
                                    <label> <?php echo e(Form::checkbox('sexology[]','Homo')); ?>Homo </label><br>
                                    <label><?php echo e(Form::checkbox('sexology[]','Bisexual')); ?>Bisexual </label>
                                  </div>
                                    <div class="col-md-12 mb-4">
                                    <h4 class="text-white m-0">Body</h4><br>
                                    <label> <?php echo e(Form::checkbox('weight[]','Less than Average')); ?>Thin  </label><br>
                                    <label> <?php echo e(Form::checkbox('weight[]','Normal')); ?>Normal  </label><br>
                                     <label><?php echo e(Form::checkbox('weight[]','Muscular')); ?>Muscular </label><br> 
                                    <label> <?php echo e(Form::checkbox('weight[]','Chubby')); ?>Chubby </label>
                                    <br>
                                              <br>
                                      <h4 class="text-white m-0">Height</h4><br>
                                      <label> <?php echo e(Form::checkbox('height[]','<140cm')); ?><140cm   </label><br>
                                      <label> <?php echo e(Form::checkbox('height[]','140-160cm')); ?>140-160cm </label><br>
                                      <label><?php echo e(Form::checkbox('height[]','160-180cm')); ?>160-180cm </label><br>
                                      <label><?php echo e(Form::checkbox('height[]','180cm<')); ?>180cm< </label> <br>
                                  </div>
                                  <div class="col-md-12 mb-4 das">
                                      <h4 class="text-white m-0">Tits size</h4><br>
                                      <label> <?php echo e(Form::checkbox('titssize[]','Small')); ?>Small </label><br>
                                      <label> <?php echo e(Form::checkbox('titssize[]','Normal')); ?>Normal </label><br>
                                      <label> <?php echo e(Form::checkbox('titssize[]','Big')); ?>Big </label>
                                  </div>
                                   <div class="col-md-12 mb-4 ass">
                                    <h4 class="text-white m-0">Ass</h4><br>
                                    <label>  <?php echo e(Form::checkbox('ass[]','Small')); ?>Small </label><br>
                                    <label> <?php echo e(Form::checkbox('ass[]','Normal')); ?>Normal </label><br>
                                 
                                    <label> <?php echo e(Form::checkbox('ass[]','Big')); ?>Big </label>
                                    
 
                                  </div>
                                  <div class="col-md-12 mb-4 logy">
                                      <h4 class="text-white m-0">Privy part</h4><br>
                                      <label><?php echo e(Form::checkbox('privy[]','Shaved')); ?>Shaved </label><br>
                                      <label> <?php echo e(Form::checkbox('privy[]','Unshaved')); ?>Unshaved </label><br>
                                          
                                  </div>
                                   <div class="col-md-12 mb-4">
                                    <h4 class="text-white m-0">Eyes/lenses</h4><br>
                                    <label><?php echo e(Form::checkbox('eyecolor[]','blue')); ?>Blue </label> <br>
                                    <label><?php echo e(Form::checkbox('eyecolor[]','brown')); ?>Brown </label> <br>
                                    <label><?php echo e(Form::checkbox('eyecolor[]','brown-green')); ?>Brown-green </label><br> 
                                     <label><?php echo e(Form::checkbox('eyecolor[]','golden')); ?>Golden  </label><br>
                                     <label><?php echo e(Form::checkbox('eyecolor[]','gray')); ?>Gray  </label><br>
                                     <label><?php echo e(Form::checkbox('eyecolor[]','green')); ?>Green </label><br>
                                     <label><?php echo e(Form::checkbox('eyecolor[]','red')); ?>Red </label> <br>
                                     <label><?php echo e(Form::checkbox('eyecolor[]','white')); ?>White </label> <br>
                                     <label><?php echo e(Form::checkbox('eyecolor[]','yellow')); ?>Yellow  </label><br>
                                     <label><?php echo e(Form::checkbox('eyecolor[]','indigo')); ?>Indigo </label> <br>
                                     <label><?php echo e(Form::checkbox('eyecolor[]','violet')); ?>Violet </label> <br>
                                  </div>
                                        <div class="col-md-12 mb-4 ass">
                                    <h4 class="text-white m-0">Hair color</h4><br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','blue')); ?>Blue  </label><br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','brown')); ?>Brown  </label><br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','black')); ?>Black </label><br> 
                                     <label><?php echo e(Form::checkbox('haircolor[]','blonde')); ?>Blonde </label> <br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','gray')); ?>Gray  </label><br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','green')); ?>Green </label><br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','red')); ?>Red  </label><br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','white')); ?>White </label> <br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','yellow')); ?>Yellow </label> <br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','silver')); ?>Silver </label> <br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','indigo')); ?>Indigo </label> <br>
                                     <label><?php echo e(Form::checkbox('haircolor[]','violet')); ?>Violet  </label><br>
                                  </div>
                                 
                                   <div class="col-md-12 mb-4 logy">
                                      <h4 class="text-white m-0">Hair Length</h4><br>
                                     <label><?php echo e(Form::checkbox('hairlength[]','Very short')); ?>Very short  </label><br>
                                     <label><?php echo e(Form::checkbox('hairlength[]','Short')); ?>Short  </label><br>
                                     <label><?php echo e(Form::checkbox('hairlength[]','Long')); ?>Long  </label><br>
                                     <label><?php echo e(Form::checkbox('hairlength[]','Very Long')); ?>Very Long  </label><br>
                                  </div>
                                 
                                  <!--div class="col-md-12 mb-4">
                                   <h4 class="text-white m-0">Age</h4><br>
                                    <?php echo e(Form::checkbox('age[]','18-24')); ?>18-24 <br>
                                    <?php echo e(Form::checkbox('age[]','25-34')); ?>25-34<br>
                                    <?php echo e(Form::checkbox('age[]','35-44')); ?>35-44<br>
                                    <?php echo e(Form::checkbox('age[]','45 +')); ?>45 +
                                </div-->
                              </div><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/popup.blade.php ENDPATH**/ ?>