var fluid_1_4=fluid_1_4||{};(function($,fluid){fluid.registerNamespace("fluid.tableOfContents");fluid.tableOfContents.insertAnchor=function(name,element){var anchor=$("<a></a>",element.ownerDocument);anchor.prop({name:name,id:name});anchor.insertBefore(element)};fluid.tableOfContents.generateGUID=function(){return fluid.allocateSimpleId()};fluid.tableOfContents.filterHeadings=function(headings){return headings.filter(":visible")};fluid.tableOfContents.finalInit=function(that){var headings=that.filterHeadings(that.locate("headings"));that.headingTextToAnchor=function(heading){var guid=that.generateGUID();var anchorInfo={id:guid,url:"#"+guid};that.insertAnchor(anchorInfo.id,heading);return anchorInfo};that.anchorInfo=fluid.transform(headings,function(heading){return that.headingTextToAnchor(heading)});that.hide=function(){that.locate("tocContainer").hide()};that.show=function(){that.locate("tocContainer").show()};that.model=that.modelBuilder.assembleModel(headings,that.anchorInfo);that.events.onReady.fire()};fluid.defaults("fluid.tableOfContents",{gradeNames:["fluid.viewComponent","autoInit"],finalInitFunction:"fluid.tableOfContents.finalInit",components:{levels:{type:"fluid.tableOfContents.levels",container:"{tableOfContents}.dom.tocContainer",createOnEvent:"onReady",options:{model:{headings:"{tableOfContents}.model"},events:{afterRender:"{tableOfContents}.events.afterRender"}}},modelBuilder:{type:"fluid.tableOfContents.modelBuilder"}},invokers:{insertAnchor:"fluid.tableOfContents.insertAnchor",generateGUID:"fluid.tableOfContents.generateGUID",filterHeadings:"fluid.tableOfContents.filterHeadings"},selectors:{headings:":header",tocContainer:".flc-toc-tocContainer"},events:{onReady:null,afterRender:null}});fluid.registerNamespace("fluid.tableOfContents.modelBuilder");fluid.tableOfContents.modelBuilder.toModel=function(headingInfo,modelLevelFn){var headings=fluid.copy(headingInfo);var buildModelLevel=function(headings,level){var modelLevel=[];while(headings.length>0){var heading=headings[0];if(heading.level<level){break}if(heading.level>level){var subHeadings=buildModelLevel(headings,level+1);if(modelLevel.length>0){modelLevel[modelLevel.length-1].headings=subHeadings}else{modelLevel=modelLevelFn(modelLevel,subHeadings)}}if(heading.level===level){modelLevel.push(heading);headings.shift()}}return modelLevel};return buildModelLevel(headings,1)};fluid.tableOfContents.modelBuilder.gradualModelLevelFn=function(modelLevel,subHeadings){var subHeadingsClone=fluid.copy(subHeadings);subHeadingsClone[0].level--;return subHeadingsClone};fluid.tableOfContents.modelBuilder.skippedModelLevelFn=function(modelLevel,subHeadings){modelLevel.push({headings:subHeadings});return modelLevel};fluid.tableOfContents.modelBuilder.finalInit=function(that){that.convertToHeadingObjects=function(headings,anchorInfo){headings=$(headings);return fluid.transform(headings,function(heading,index){return{level:that.headingCalculator.getHeadingLevel(heading),text:$(heading).text(),url:anchorInfo[index].url}})};that.assembleModel=function(headings,anchorInfo){var headingInfo=that.convertToHeadingObjects(headings,anchorInfo);return that.toModel(headingInfo)}};fluid.defaults("fluid.tableOfContents.modelBuilder",{gradeNames:["fluid.littleComponent","autoInit"],finalInitFunction:"fluid.tableOfContents.modelBuilder.finalInit",components:{headingCalculator:{type:"fluid.tableOfContents.modelBuilder.headingCalculator"}},invokers:{toModel:{funcName:"fluid.tableOfContents.modelBuilder.toModel",args:["{arguments}.0","{modelBuilder}.modelLevelFn"]},modelLevelFn:"fluid.tableOfContents.modelBuilder.gradualModelLevelFn"}});fluid.registerNamespace("fluid.tableOfContents.modelBuilder.headingCalculator");fluid.tableOfContents.modelBuilder.headingCalculator.finalInit=function(that){that.getHeadingLevel=function(heading){return $.inArray(heading.tagName,that.options.levels)+1}};fluid.defaults("fluid.tableOfContents.modelBuilder.headingCalculator",{gradeNames:["fluid.littleComponent","autoInit"],finalInitFunction:"fluid.tableOfContents.modelBuilder.headingCalculator.finalInit",levels:["H1","H2","H3","H4","H5","H6"]});fluid.registerNamespace("fluid.tableOfContents.levels");fluid.tableOfContents.levels.finalInit=function(that){fluid.fetchResources(that.options.resources,function(){that.container.append(that.options.resources.template.resourceText);that.refreshView()})};fluid.tableOfContents.levels.objModel=function(type,ID){var objModel={ID:type+ID+":",children:[]};return objModel};fluid.tableOfContents.levels.handleEmptyItemObj=function(itemObj){itemObj.decorators=[{type:"addClass",classes:"fl-tableOfContents-hide-bullet"}]};fluid.tableOfContents.levels.generateTree=function(headingsModel,currentLevel){currentLevel=currentLevel||0;var levelObj=fluid.tableOfContents.levels.objModel("level",currentLevel);if(headingsModel.headings.length===0){return[]}if(currentLevel===0){var tree={children:[fluid.tableOfContents.levels.generateTree(headingsModel,currentLevel+1)]};return tree}$.each(headingsModel.headings,function(index,model){var itemObj=fluid.tableOfContents.levels.objModel("items",currentLevel);var linkObj={ID:"link"+currentLevel,target:model.url,linktext:model.text};if(!model.level){fluid.tableOfContents.levels.handleEmptyItemObj(itemObj)}else{itemObj.children.push(linkObj)}if(model.headings){itemObj.children.push(fluid.tableOfContents.levels.generateTree(model,currentLevel+1))}levelObj.children.push(itemObj)});return levelObj};fluid.tableOfContents.levels.produceTree=function(that){return fluid.tableOfContents.levels.generateTree(that.model)};fluid.defaults("fluid.tableOfContents.levels",{gradeNames:["fluid.rendererComponent","autoInit"],finalInitFunction:"fluid.tableOfContents.levels.finalInit",produceTree:"fluid.tableOfContents.levels.produceTree",selectors:{level1:".flc-toc-levels-level1",level2:".flc-toc-levels-level2",level3:".flc-toc-levels-level3",level4:".flc-toc-levels-level4",level5:".flc-toc-levels-level5",level6:".flc-toc-levels-level6",items1:".flc-toc-levels-items1",items2:".flc-toc-levels-items2",items3:".flc-toc-levels-items3",items4:".flc-toc-levels-items4",items5:".flc-toc-levels-items5",items6:".flc-toc-levels-items6",link1:".flc-toc-levels-link1",link2:".flc-toc-levels-link2",link3:".flc-toc-levels-link3",link4:".flc-toc-levels-link4",link5:".flc-toc-levels-link5",link6:".flc-toc-levels-link6"},repeatingSelectors:["level1","level2","level3","level4","level5","level6","items1","items2","items3","items4","items5","items6"],model:{headings:[]},resources:{template:{forceCache:true,url:"../html/TableOfContents.html"}},rendererFnOptions:{noexpand:true},rendererOptions:{debugMode:false}})})(jQuery,fluid_1_4);