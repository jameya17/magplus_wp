(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// library properties:
lib.properties = {
	width: 960,
	height: 690,
	fps: 60,
	color: "#E9E9E9",
	manifest: [
		{src:"/wp-content/themes/magplus_2/images/infographics/car.jpg", id:"car"},
		{src:"/wp-content/themes/magplus_2/images/infographics/tableth.jpg", id:"tableth"},
		{src:"/wp-content/themes/magplus_2/images/infographics/tabletv.jpg", id:"tabletv"}
	]
};



// symbols:



(lib.car = function() {
	this.initialize(img.car);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,84,98);


(lib.tableth = function() {
	this.initialize(img.tableth);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,400,248);


(lib.tabletv = function() {
	this.initialize(img.tabletv);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,289,386);


(lib.tabletscreenv = function() {
	this.initialize();

	// Layer 2
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#999999").ss(1.5,1,1).p("AoqrfIRVAAIAAW/IxVAAg");
	this.shape.setTransform(55.2,74);

	// Layer 1
	this.instance = new lib.tabletv();
	this.instance.setTransform(0,0,0.382,0.382);

	this.addChild(this.instance,this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-1.3,-0.6,113.1,149.3);


(lib.tabletscreenh = function() {
	this.initialize();

	// Layer 2
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#999999").ss(3.6,1,1).p("AuEIsIAAxXIcJAAIAARXg");
	this.shape.setTransform(90.3,56);

	// Layer 1
	this.instance = new lib.tableth();
	this.instance.setTransform(0,0,0.453,0.453);

	this.addChild(this.instance,this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-1.5,-1.3,183.8,114.7);


(lib.shadow = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(0,0,0,0)","rgba(0,0,0,0.11)","rgba(0,0,0,0.102)","rgba(0,0,0,0)"],[0.027,0.102,0.886,1],-52,0,52,0).s().p("AoHGAIAAr/IQPAAIAAL/g");
	this.shape.setTransform(52,38.5);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,104.1,76.9);


(lib.mobileusericon = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#666666").s().p("AAjA4IAdgHIhEhjIg7AIIA5BQIgGANIhGhmIBSgNIBTB5IgtAIg");
	this.shape.setTransform(8.3,20.9);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#666666").s().p("AADAcIgHgHIgIgCIgHgMIACgHIgLgIIAAgIIAJgEIAZAHQgGgKAAgCIADgCIADAAIALAHIANAUIgFAcg");
	this.shape_1.setTransform(7.4,26.5);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#666666").s().p("AgeCmIgBACIhKgnIACgZQADgOAJADQASAMAKAAQAQABALAEQACABAFgOIAJguIALhBIgBAAQgPACgDgCQgFgDADgDQgMgHgEgKIgBgBIgPAAIgBgVIgGgHIgFABIgEgNIgNgQQgFgLACgIQACgKANgMIAbgYQAXgLAQAEQAPAEASAWQAOASACAeQAAAPgCAMQguAXgHAKQgDAGAOAHIABgGQAKgMAagIQAagHAPAFIASAUQASAbAAAhQgGgJgQAEQgPADgQAOQgBACgUAwQgUAvgCACQgTAWgGACIgBAAIgOgCg");
	this.shape_2.setTransform(21.9,16.9);

	this.addChild(this.shape_2,this.shape_1,this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,32.6,33.8);


(lib.arrowTail1 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#F36F21").s().p("EA7MAGLIAAhzMh8jgAIIAAoaMB8jgACIAAh+IABAAIGLGKImLGLg");
	this.shape.setTransform(200.5,27);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-217.9,-12.6,837,79.1);


(lib.people = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.play();
	}
	this.frame_20 = function() {
		this.stop();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(20).call(this.frame_20).wait(1));

	// Layer 2 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	var mask_graphics_1 = new cjs.Graphics().p("EgDLAxYMAAAhivIGXAAMAAABivg");
	var mask_graphics_2 = new cjs.Graphics().p("EgF3AxYMAAAhivILvAAMAAABivg");
	var mask_graphics_3 = new cjs.Graphics().p("EgIiAxYMAAAhivIRFAAMAAABivg");
	var mask_graphics_4 = new cjs.Graphics().p("EgLNAxYMAAAhivIWbAAMAAABivg");
	var mask_graphics_5 = new cjs.Graphics().p("EgN4AxYMAAAhivIbxAAMAAABivg");
	var mask_graphics_6 = new cjs.Graphics().p("EgQjAxYMAAAhivMAhHAAAMAAABivg");
	var mask_graphics_7 = new cjs.Graphics().p("EgTOAxYMAAAhivMAmdAAAMAAABivg");
	var mask_graphics_8 = new cjs.Graphics().p("EgV5AxYMAAAhivMArzAAAMAAABivg");
	var mask_graphics_9 = new cjs.Graphics().p("EgYkAxYMAAAhivMAxJAAAMAAABivg");
	var mask_graphics_10 = new cjs.Graphics().p("EgbQAxYMAAAhivMA2hAAAMAAABivg");
	var mask_graphics_11 = new cjs.Graphics().p("Egd7AxYMAAAhivMA73AAAMAAABivg");
	var mask_graphics_12 = new cjs.Graphics().p("EggmAxYMAAAhivMBBNAAAMAAABivg");
	var mask_graphics_13 = new cjs.Graphics().p("EgjRAxYMAAAhivMBGjAAAMAAABivg");
	var mask_graphics_14 = new cjs.Graphics().p("Egl8AxYMAAAhivMBL5AAAMAAABivg");
	var mask_graphics_15 = new cjs.Graphics().p("EgonAxYMAAAhivMBRPAAAMAAABivg");
	var mask_graphics_16 = new cjs.Graphics().p("EgrSAxYMAAAhivMBWlAAAMAAABivg");
	var mask_graphics_17 = new cjs.Graphics().p("Egt9AxYMAAAhivMBb7AAAMAAABivg");
	var mask_graphics_18 = new cjs.Graphics().p("EgwpAxYMAAAhivMBhTAAAMAAABivg");
	var mask_graphics_19 = new cjs.Graphics().p("EgzUAxYMAAAhivMBmpAAAMAAABivg");
	var mask_graphics_20 = new cjs.Graphics().p("Eg1/AxYMAAAhivMBr/AAAMAAABivg");

	this.timeline.addTween(cjs.Tween.get(mask).to({graphics:null,x:0,y:0}).wait(1).to({graphics:mask_graphics_1,x:20.5,y:296.5}).wait(1).to({graphics:mask_graphics_2,x:37.6,y:296.6}).wait(1).to({graphics:mask_graphics_3,x:54.7,y:296.7}).wait(1).to({graphics:mask_graphics_4,x:71.8,y:296.8}).wait(1).to({graphics:mask_graphics_5,x:88.9,y:296.8}).wait(1).to({graphics:mask_graphics_6,x:106.1,y:296.9}).wait(1).to({graphics:mask_graphics_7,x:123.2,y:297}).wait(1).to({graphics:mask_graphics_8,x:140.3,y:297.1}).wait(1).to({graphics:mask_graphics_9,x:157.4,y:297.2}).wait(1).to({graphics:mask_graphics_10,x:174.5,y:297.3}).wait(1).to({graphics:mask_graphics_11,x:191.6,y:297.4}).wait(1).to({graphics:mask_graphics_12,x:208.7,y:297.5}).wait(1).to({graphics:mask_graphics_13,x:225.8,y:297.6}).wait(1).to({graphics:mask_graphics_14,x:243,y:297.7}).wait(1).to({graphics:mask_graphics_15,x:260.1,y:297.8}).wait(1).to({graphics:mask_graphics_16,x:277.2,y:297.9}).wait(1).to({graphics:mask_graphics_17,x:294.3,y:297.9}).wait(1).to({graphics:mask_graphics_18,x:311.4,y:298}).wait(1).to({graphics:mask_graphics_19,x:328.5,y:298.1}).wait(1).to({graphics:mask_graphics_20,x:345.6,y:298.5}).wait(1));

	// FlashAICB
	this.instance = new lib.mobileusericon("synched",0);
	this.instance.setTransform(716.2,83.1,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_1 = new lib.mobileusericon("synched",0);
	this.instance_1.setTransform(716.2,151.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_2 = new lib.mobileusericon("synched",0);
	this.instance_2.setTransform(716.2,221.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_3 = new lib.mobileusericon("synched",0);
	this.instance_3.setTransform(716.2,286,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_4 = new lib.mobileusericon("synched",0);
	this.instance_4.setTransform(716.2,350.8,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_5 = new lib.mobileusericon("synched",0);
	this.instance_5.setTransform(716.2,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_6 = new lib.mobileusericon("synched",0);
	this.instance_6.setTransform(716.2,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_7 = new lib.mobileusericon("synched",0);
	this.instance_7.setTransform(716.2,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_8 = new lib.mobileusericon("synched",0);
	this.instance_8.setTransform(654.6,83.1,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_9 = new lib.mobileusericon("synched",0);
	this.instance_9.setTransform(654.6,151.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_10 = new lib.mobileusericon("synched",0);
	this.instance_10.setTransform(654.6,221.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_11 = new lib.mobileusericon("synched",0);
	this.instance_11.setTransform(654.6,286,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_12 = new lib.mobileusericon("synched",0);
	this.instance_12.setTransform(654.6,350.8,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_13 = new lib.mobileusericon("synched",0);
	this.instance_13.setTransform(654.6,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_14 = new lib.mobileusericon("synched",0);
	this.instance_14.setTransform(654.6,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_15 = new lib.mobileusericon("synched",0);
	this.instance_15.setTransform(654.6,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_16 = new lib.mobileusericon("synched",0);
	this.instance_16.setTransform(594.6,83.1,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_17 = new lib.mobileusericon("synched",0);
	this.instance_17.setTransform(594.6,151.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_18 = new lib.mobileusericon("synched",0);
	this.instance_18.setTransform(594.6,221.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_19 = new lib.mobileusericon("synched",0);
	this.instance_19.setTransform(594.6,286,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_20 = new lib.mobileusericon("synched",0);
	this.instance_20.setTransform(594.6,350.8,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_21 = new lib.mobileusericon("synched",0);
	this.instance_21.setTransform(594.6,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_22 = new lib.mobileusericon("synched",0);
	this.instance_22.setTransform(594.6,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_23 = new lib.mobileusericon("synched",0);
	this.instance_23.setTransform(594.6,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_24 = new lib.mobileusericon("synched",0);
	this.instance_24.setTransform(533,83.1,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_25 = new lib.mobileusericon("synched",0);
	this.instance_25.setTransform(533,151.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_26 = new lib.mobileusericon("synched",0);
	this.instance_26.setTransform(533,221.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_27 = new lib.mobileusericon("synched",0);
	this.instance_27.setTransform(533,286,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_28 = new lib.mobileusericon("synched",0);
	this.instance_28.setTransform(533,350.8,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_29 = new lib.mobileusericon("synched",0);
	this.instance_29.setTransform(533,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_30 = new lib.mobileusericon("synched",0);
	this.instance_30.setTransform(533,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_31 = new lib.mobileusericon("synched",0);
	this.instance_31.setTransform(533,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_32 = new lib.mobileusericon("synched",0);
	this.instance_32.setTransform(475.3,83.1,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_33 = new lib.mobileusericon("synched",0);
	this.instance_33.setTransform(475.3,151.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_34 = new lib.mobileusericon("synched",0);
	this.instance_34.setTransform(418.3,151.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_35 = new lib.mobileusericon("synched",0);
	this.instance_35.setTransform(475.3,221.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_36 = new lib.mobileusericon("synched",0);
	this.instance_36.setTransform(475.3,286,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_37 = new lib.mobileusericon("synched",0);
	this.instance_37.setTransform(475.3,350.8,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_38 = new lib.mobileusericon("synched",0);
	this.instance_38.setTransform(475.3,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_39 = new lib.mobileusericon("synched",0);
	this.instance_39.setTransform(475.3,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_40 = new lib.mobileusericon("synched",0);
	this.instance_40.setTransform(475.3,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_41 = new lib.mobileusericon("synched",0);
	this.instance_41.setTransform(418.3,221.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_42 = new lib.mobileusericon("synched",0);
	this.instance_42.setTransform(418.3,286,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_43 = new lib.mobileusericon("synched",0);
	this.instance_43.setTransform(418.3,350.8,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_44 = new lib.mobileusericon("synched",0);
	this.instance_44.setTransform(418.3,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_45 = new lib.mobileusericon("synched",0);
	this.instance_45.setTransform(418.3,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_46 = new lib.mobileusericon("synched",0);
	this.instance_46.setTransform(418.3,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_47 = new lib.mobileusericon("synched",0);
	this.instance_47.setTransform(359.3,221.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_48 = new lib.mobileusericon("synched",0);
	this.instance_48.setTransform(359.3,286,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_49 = new lib.mobileusericon("synched",0);
	this.instance_49.setTransform(300.3,286,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_50 = new lib.mobileusericon("synched",0);
	this.instance_50.setTransform(359.3,350.8,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_51 = new lib.mobileusericon("synched",0);
	this.instance_51.setTransform(300.3,350.8,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_52 = new lib.mobileusericon("synched",0);
	this.instance_52.setTransform(237.3,350.8,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_53 = new lib.mobileusericon("synched",0);
	this.instance_53.setTransform(359.3,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_54 = new lib.mobileusericon("synched",0);
	this.instance_54.setTransform(300.3,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_55 = new lib.mobileusericon("synched",0);
	this.instance_55.setTransform(237.3,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_56 = new lib.mobileusericon("synched",0);
	this.instance_56.setTransform(178.3,415.6,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_57 = new lib.mobileusericon("synched",0);
	this.instance_57.setTransform(359.3,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_58 = new lib.mobileusericon("synched",0);
	this.instance_58.setTransform(300.3,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_59 = new lib.mobileusericon("synched",0);
	this.instance_59.setTransform(237.3,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_60 = new lib.mobileusericon("synched",0);
	this.instance_60.setTransform(178.3,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_61 = new lib.mobileusericon("synched",0);
	this.instance_61.setTransform(117.3,480.4,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_62 = new lib.mobileusericon("synched",0);
	this.instance_62.setTransform(359.3,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_63 = new lib.mobileusericon("synched",0);
	this.instance_63.setTransform(300.3,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_64 = new lib.mobileusericon("synched",0);
	this.instance_64.setTransform(237.3,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_65 = new lib.mobileusericon("synched",0);
	this.instance_65.setTransform(178.3,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_66 = new lib.mobileusericon("synched",0);
	this.instance_66.setTransform(117.3,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.instance_67 = new lib.mobileusericon("synched",0);
	this.instance_67.setTransform(58.3,545.2,1.356,1.356,0,0,0,16.3,16.9);

	this.shape = new cjs.Shape();
	this.shape.graphics.f("#8E8E8E").s().p("AcjAAQAHAAAHAAQAHAAAHAAgAXvAAQAGAAAIAAQAIAAAGAAgAS7AAQAGAAAHAAQAIAAAHAAgAOXAAQAHAAAHAAQAHAAAHAAgAJjAAQAHAAAHAAQAIAAAGAAgAEvAAQAGAAAHAAQAIAAAHAAgAgDAAQAEAAAHAAQAIAAAGAAgAk4AAQAHAAAHAAQAHAAAHAAgApsAAQAHAAAHAAQAIAAAFAAgAugAAQAGAAAHAAQAIAAAHAAgAzUAAQAGAAAHAAQAIAAAGAAgA4KAAQAHAAAHAAQAIAAAFAAgA8+AAQAGAAAHAAQAIAAAGAAg");
	this.shape.setTransform(511.3,0.1);

	this.instance.mask = this.instance_1.mask = this.instance_2.mask = this.instance_3.mask = this.instance_4.mask = this.instance_5.mask = this.instance_6.mask = this.instance_7.mask = this.instance_8.mask = this.instance_9.mask = this.instance_10.mask = this.instance_11.mask = this.instance_12.mask = this.instance_13.mask = this.instance_14.mask = this.instance_15.mask = this.instance_16.mask = this.instance_17.mask = this.instance_18.mask = this.instance_19.mask = this.instance_20.mask = this.instance_21.mask = this.instance_22.mask = this.instance_23.mask = this.instance_24.mask = this.instance_25.mask = this.instance_26.mask = this.instance_27.mask = this.instance_28.mask = this.instance_29.mask = this.instance_30.mask = this.instance_31.mask = this.instance_32.mask = this.instance_33.mask = this.instance_34.mask = this.instance_35.mask = this.instance_36.mask = this.instance_37.mask = this.instance_38.mask = this.instance_39.mask = this.instance_40.mask = this.instance_41.mask = this.instance_42.mask = this.instance_43.mask = this.instance_44.mask = this.instance_45.mask = this.instance_46.mask = this.instance_47.mask = this.instance_48.mask = this.instance_49.mask = this.instance_50.mask = this.instance_51.mask = this.instance_52.mask = this.instance_53.mask = this.instance_54.mask = this.instance_55.mask = this.instance_56.mask = this.instance_57.mask = this.instance_58.mask = this.instance_59.mask = this.instance_60.mask = this.instance_61.mask = this.instance_62.mask = this.instance_63.mask = this.instance_64.mask = this.instance_65.mask = this.instance_66.mask = this.instance_67.mask = this.shape.mask = mask;

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[{t:this.shape},{t:this.instance_67},{t:this.instance_66},{t:this.instance_65},{t:this.instance_64},{t:this.instance_63},{t:this.instance_62},{t:this.instance_61},{t:this.instance_60},{t:this.instance_59},{t:this.instance_58},{t:this.instance_57},{t:this.instance_56},{t:this.instance_55},{t:this.instance_54},{t:this.instance_53},{t:this.instance_52},{t:this.instance_51},{t:this.instance_50},{t:this.instance_49},{t:this.instance_48},{t:this.instance_47},{t:this.instance_46},{t:this.instance_45},{t:this.instance_44},{t:this.instance_43},{t:this.instance_42},{t:this.instance_41},{t:this.instance_40},{t:this.instance_39},{t:this.instance_38},{t:this.instance_37},{t:this.instance_36},{t:this.instance_35},{t:this.instance_34},{t:this.instance_33},{t:this.instance_32},{t:this.instance_31},{t:this.instance_30},{t:this.instance_29},{t:this.instance_28},{t:this.instance_27},{t:this.instance_26},{t:this.instance_25},{t:this.instance_24},{t:this.instance_23},{t:this.instance_22},{t:this.instance_21},{t:this.instance_20},{t:this.instance_19},{t:this.instance_18},{t:this.instance_17},{t:this.instance_16},{t:this.instance_15},{t:this.instance_14},{t:this.instance_13},{t:this.instance_12},{t:this.instance_11},{t:this.instance_10},{t:this.instance_9},{t:this.instance_8},{t:this.instance_7},{t:this.instance_6},{t:this.instance_5},{t:this.instance_4},{t:this.instance_3},{t:this.instance_2},{t:this.instance_1},{t:this.instance}]},1).wait(20));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = null;


(lib.monitor = function() {
	this.initialize();

	// FlashAICB
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#CCCCCC").s().p("AgcgGIm+BwIGsioIj2mFIEkFiIElliIj2GFIGsCoIm+hwIgdHJg");
	this.shape.setTransform(195.7,113.6,0.191,0.191);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#CCCCCC").s().p("AgHDzIkrDFIBwlUIkYjdIFmACIB8lPIBtFUIFmAQIkjDQIBfFZg");
	this.shape_1.setTransform(195.8,112.5,0.122,0.122);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#CCCCCC").s().p("AgkgQIgKgfIBdBPIgLAQg");
	this.shape_2.setTransform(203.9,119.7);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#CCCCCC").s().p("AggBOIAAgFQAPgCADgDQAEgEAAgPIAAh0IgNAAQgUAAgHAFQgHAGgEAUIgFAAIABgpICDAAIABApIgFAAQgEgUgHgFQgGgGgUAAIgNAAIAAB3QAAAOAEADQAEADAPABIAAAFg");
	this.shape_3.setTransform(196.8,87.4);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#CCCCCC").s().p("AA1BSQAAAAgBAAQgBAAAAgBQgBAAAAAAQgBAAAAgBQgBAAAAgBQAAgBgBAAQAAgBAAAAQAAgBAAAAQAAgEACgCQAAAAABAAQAAgBABAAQAAAAABAAQABgBAAAAIAXAAIAAgBQAAgBAAgBQABAAAAgBQAAAAAAgBQABAAAAgBQABAAAAgBQABAAAAAAQABgBABAAQAAAAABAAQAAAAABAAQABAAAAABQABAAAAAAQABABAAAAQABABAAAAQAAABAAAAQABABAAAAQAAABAAABIAAAJQAAAAAAABQAAAAgBABQAAAAAAABQAAABgBAAQAAABgBAAQAAAAgBAAQAAABgBAAQgBAAAAAAgAgTBSQgBAAAAAAQgBAAgBgBQAAAAgBAAQAAAAgBgBQAAAAAAgBQgBgBAAAAQAAgBAAAAQAAgBAAAAQAAgEABgCQABAAAAAAQABgBAAAAQABAAABAAQAAgBABAAIAjAAQAAAAABABQABAAAAAAQABAAAAABQABAAAAAAQACACAAAEQAAAAAAABQAAAAgBABQAAAAAAABQAAABgBAAQAAABgBAAQAAAAgBAAQAAABgBAAQgBAAAAAAgAhSBSQAAAAgBAAQAAAAgBgBQAAAAgBAAQAAAAgBgBQAAAAgBgBQAAgBAAAAQgBgBAAAAQAAgBAAAAIAAgOQAAgBAAAAQAAgBABAAQAAgBAAAAQABgBAAAAQABgBAAgBQABAAAAAAQABgBAAAAQABAAAAAAQADAAACADQAAAAABABQAAAAAAABQAAAAABABQAAAAAAABIAAAGIASAAQABAAABABQAAAAABAAQAAAAABABQAAAAABAAQACACAAAEQAAAAAAABQAAAAgBABQAAAAAAABQgBABAAAAQgBABAAAAQgBAAAAAAQgBABAAAAQgBAAgBAAgABOAfQAAgBgBAAQAAgBAAAAQAAgBgBAAQAAgBAAgBIAAgmQAAgDACgCQABAAAAgBQABAAAAAAQABgBABAAQAAAAABAAQAAAAABAAQABAAAAABQABAAAAAAQABABAAAAQACACAAADIAAAmQAAABAAABQAAAAgBABQAAAAAAABQAAAAgBABQAAAAgBABQAAAAgBABQAAAAgBAAQgBAAAAAAQgBAAAAAAQgBAAgBAAQAAgBgBAAQAAgBgBAAgAhWAaQgCgCAAgCIAAgnQAAgBAAAAQAAgBABAAQAAgBAAAAQABgBAAAAQABgBAAAAQABgBAAAAQABAAAAAAQABAAAAAAQABAAABAAQAAAAABAAQAAAAABABQAAAAABABQAAAAABABQAAAAAAABQAAAAABABQAAAAAAABIAAAnQAAACgCACQgBABAAAAQgBABAAAAQgBAAAAAAQgBABgBAAQAAAAgBgBQAAAAgBAAQAAAAgBgBQAAAAgBgBgABOgwQAAgBgBAAQAAgBAAAAQAAgBgBAAQAAgBAAgBIAAgOIgKAAQgBAAAAgBQgBAAgBAAQAAAAgBgBQAAAAgBAAQAAgBgBgBQAAAAAAgBQAAAAgBgBQAAAAAAgBQAAgDACgCQABAAAAgBQABAAAAAAQABgBABAAQAAAAABAAIARAAQAAAAABAAQABAAAAABQABAAAAAAQABABAAAAQACACAAADIAAAVQAAABAAABQAAAAgBABQAAAAAAABQAAAAgBABQAAAAgBABQAAAAgBABQAAAAgBAAQgBAAAAAAQgBAAAAAAQgBAAgBAAQAAgBgBAAQAAgBgBAAgAhWg1QAAAAgBgBQAAAAAAgBQgBAAAAgBQAAAAAAgBIAAgRQAAgDACgCQABAAAAgBQABAAAAAAQABgBAAAAQABAAAAAAIAmAAQAAAAABAAQABAAAAABQABAAAAAAQABABAAAAQACACAAADQAAABAAAAQAAABAAAAQAAABgBAAQAAABgBABQAAAAgBAAQAAABgBAAQAAAAgBAAQgBABAAAAIgfAAIAAAKQAAABAAAAQgBABAAAAQAAABAAAAQgBABAAAAQgBABAAAAQgBABAAAAQgBAAAAAAQgBABgBAAQAAAAgBgBQAAAAgBAAQAAAAgBgBQAAAAgBgBgAgHhDQAAAAgBgBQgBAAAAAAQgBAAAAgBQgBAAAAAAQgBgBAAgBQAAAAAAgBQgBAAAAgBQAAAAAAgBQAAgDACgCQAAAAABgBQAAAAABAAQAAgBABAAQABAAAAAAIAjAAQABAAAAAAQABAAABABQAAAAABAAQAAABABAAQABACAAADQAAABAAAAQAAABAAAAQAAABgBAAQAAABAAABQgBAAAAAAQgBABAAAAQgBAAgBAAQAAABgBAAg");
	this.shape_4.setTransform(196.3,57.6);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#CCCCCC").s().p("AgdA4Ig3AsIAAjlICpCpIhSAAIAfBQIgdAKg");
	this.shape_5.setTransform(196.8,26.8,0.529,0.529);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#4F4F4F").s().p("AiiBzIAAjlIFFAAIAADlg");
	this.shape_6.setTransform(196.5,27.8);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#747474").s().p("Ai/I0IAAxnIF/AAIAARng");
	this.shape_7.setTransform(196.1,69.5);

	// FlashAICB
	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AgdA4Ig3AsIAAjlICpCpIhSAAIAfBQIgdAKg");
	this.shape_8.setTransform(104.8,80);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AgdA4Ig3AsIAAjlICpCpIhSAAIAfBQIgdAKg");
	this.shape_9.setTransform(103.7,81.5);

	// pic
	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f().s("#FFFFFF").ss(1,1,1).p("AF3m0IrsNp");
	this.shape_10.setTransform(61.6,66.9);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f().s("#FFFFFF").ss(1,1,1).p("Al6m9IL1N7");
	this.shape_11.setTransform(61.2,67.2);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("rgba(0,0,0,0.2)").s().p("Ai/IqIAAxTIF/AAIAARTg");
	this.shape_12.setTransform(192.8,70.5);

	this.instance = new lib.car();
	this.instance.setTransform(22.5,22,0.918,0.918);

	// Layer 7
	this.text = new cjs.Text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dui dolor, rutrum vel nulla non, euismod vulputate ante. Integer sit amet lectus et neque rutrum rutrum. Donec cursus pretium ipsum, ut blandit dui dictum et. Phasellus venenatis orci.", "7px 'Helvetica'", "#CCCCCC");
	this.text.lineHeight = 9;
	this.text.lineWidth = 102;
	this.text.setTransform(105.1,35);

	// FlashAICB
	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f().s("#999999").ss(0.5).p("AO9pCIAABmIBkAAAO9lyIBkAAAO9kIIBkAAAO9lyIAABqIAABqIBkAAAO9ncIAABqALcpCIAABmIBxAAIAABqIAABqIAABqIBwAAIAABrIAABoIBkAAANNpCIAABmIBwAAAJupCIAABmIAABqIBuAAIAABqIBxAAIBwAAAH9pCIAABmIBxAAIBuAAIAABqIBxAAIBwAAAH9lyIAABqIBxAAIBuAAIAABqIAABrIAABoIBxAAIAABqIAABrIBwAAIBkAAAH9lyIBxAAIAABqIAABqIAABrIAABoIAABqIBuAAIAABrIBxAAIAABqIAABqIAABmAH9ncIAABqANNieIAABrIAABoIBwAAIAABqIBkAAALcgzIBxAAIBwAAIBkAAALcieIBxAAAH9ieIAABrIAABoIBxAAIBuAAIAABqIBxAAIBwAAIAABrIAABqIAABqIAABmAH9ieIBxAAIBuAAAH9gzIBxAAIBuAAAH9CfIAABrIBxAAIBuAAIAABqIBxAAIBwAAIBkAAAH9CfIBxAAIAABrIAABqIAABqIAABmAH9A1IAABqAH9kIIAABqAO9HeIBkAAALcHeIBxAAIBwAAALcF0IAABqIAABmAH9F0IAABqIBxAAIBuAAAH9F0IBxAAIBuAAAH9HeIAABmAH9EKIAABqAEdpCIAABmIBwAAIAABqIAABqIAABqIAABrIAABoIAABqIAABrIAABqIAABqIAABmAGNpCIAABmIBwAAACupCIAABmIBvAAIAABqIAABqIBwAAIBwAAACulyIAABqIBvAAIAABqIBwAAIBwAAAEdlyIBwAAIBwAAACulyIBvAAACuncIAABqAgxpCIAABmIBtAAIAABqIAABqIAABqIAABrIAABoIAABqIAABrIByAAIBvAAIBwAAIBwAAAA8pCIAABmIByAAAihpCIAABmIBwAAIAABqIBtAAIByAAAkSpCIAABmIBxAAIAABqIAABqIBwAAIBtAAIByAAIAABqIAABrIAABoIAABqIBvAAIBwAAIBwAAAkSlyIBxAAIBwAAIAABqIAABqIAABrIAABoIBtAAIByAAIBvAAIBwAAIBwAAAkSkIIBxAAIAABqIAABrIAABoIBwAAIAABqIBtAAIByAAIAABrIAABqIAABqIBvAAIBwAAIBwAAAkSlyIAABqIAABqIBxAAIBwAAIBtAAIByAAIBvAAIAABrIBwAAIBwAAAkSncIAABqAgxgzIBtAAIByAAIBvAAIAABoIAABqIAABrIAABqIBwAAIBwAAAkSgzIBxAAIBwAAAkSA1IBxAAIAABqIAABrIBwAAIBtAAIAABqIAABqIAABmAkSgzIAABoIAABqIAABrIBxAAIAABqIBwAAIBtAAIByAAIBvAAIAABqIAABmAkSieIAABrAkSCfIBxAAIBwAAIAABrIAABqIAABqIBtAAIByAAIAABmAnxpCIAABmIBxAAIAABqIAABqIAABqIAABrIAABoIAABqIAABrIBuAAIAABqIAABqIBxAAIAABmAmApCIAABmIBuAAAphpCIAABmIBwAAIAABqIBxAAIBuAAArRpCIAABmIBwAAIAABqIAABqIBwAAIBxAAIBuAAArRlyIAABqIBwAAIAABqIAABrIAABoIBwAAIBxAAIBuAAArRlyIBwAAIBwAAIAABqIAABqIBxAAIBuAAArRncIAABqAuwpCIAABmIBwAAIAABqIAABqIBvAAIAABqIAABrIAABoIBwAAIAABqIAABrIBwAAIBxAAIAABqIAABqIAABmAtApCIAABmIBvAAAuwkIIBwAAIAABqIAABrIAABoIAABqIAABrIBvAAIAABqIAABqIBwAAIBwAAIBxAAIBuAAIAABmAuwlyIAABqIAABqIBwAAIBvAAIBwAAIBwAAIAABrIBxAAIBuAAAuwlyIBwAAIBvAAAwgkIIBwAAAwglyIBwAAAwgncIBwAAIAABqAuwgzIBwAAIBvAAIBwAAIBwAAIAABoIAABqIBxAAIBuAAAuwA1IBwAAIBvAAIAABqIAABrIBwAAIAABqIBwAAIBxAAIBuAAIBxAAIAABqIBwAAIAABmAuwieIAABrIAABoIAABqIBwAAIBvAAIBwAAIBwAAIAABrIAABqIAABqIAABmAuwEKIBwAAIAABqIAABqIAABmAuwCfIAABrIAABqIBwAAIBvAAIBwAAIAABqIAABmAwgA1IBwAAAwggzIBwAAAwgieIBwAAAwgCfIBwAAAwgEKIBwAAArRHeIAABmAuwF0IAABqIBwAAIBvAAAwgHeIBwAAIAABmAwgF0IBwAA");
	this.shape_13.setTransform(115.1,67.4);

	// Layer 3
	this.instance_1 = new lib.shadow("synched",0);
	this.instance_1.setTransform(116.2,180,2.337,0.082,0,0,0,52,38.5);
	this.instance_1.alpha = 0.27;

	// bg
	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#484747").s().dr(-105.55,-58.55,211.1,117.1);
	this.shape_14.setTransform(115.4,67.5);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#000000").s().rc(-115.55,-67.5,231.1,135,6,6,0,0);
	this.shape_15.setTransform(115.5,67.5);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.rf(["#E9E9E9","#9B9B9B"],[0,1],0,0,0,0,0,138.6).s().rr(-115.55,-78.55,231.1,157.1,6);
	this.shape_16.setTransform(115.5,78.5);

	this.shape_17 = new cjs.Shape();
	this.shape_17.graphics.lf(["#797979","#FBFBFB","#ADADAD"],[0.012,0.294,0.529],0,-15.7,0,15.8).s().p("Ak8CiQgOAAgDgJIgBgQQAWgSAZgaQAzgzASgnQARgfAFg+QADgegBgYQAAgHAHgFQAHgFAJAAIFmAAQAJAAAHAFQAHAFAAAHQgCAYABAfQADA+AQAhQARAmAtAyQAWAZATASQAAAFAEALQAAAJgOAAg");
	this.shape_17.setTransform(115.2,172.3);

	this.addChild(this.shape_17,this.shape_16,this.shape_15,this.shape_14,this.instance_1,this.shape_13,this.text,this.instance,this.shape_12,this.shape_11,this.shape_10,this.shape_9,this.shape_8,this.shape_7,this.shape_6,this.shape_5,this.shape_4,this.shape_3,this.shape_2,this.shape_1,this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-5.3,0,243.1,188.6);


(lib.devices = function() {
	this.initialize();

	// Layer 3
	this.instance = new lib.tabletscreenh("synched",0);
	this.instance.setTransform(115,147,0.448,0.448,0,0,0,90.2,55.9);

	this.shape = new cjs.Shape();
	this.shape.graphics.f("#666666").s().p("AgdAeQgMgNAAgRQAAgQAMgNQANgMAQAAQARAAANAMQAMANAAAQQAAARgMANQgNAMgRAAQgQAAgNgMg");
	this.shape.setTransform(163.1,147.8);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f().s("#999999").ss(1,1,1).p("AlvtAIICAGIAAgPIACgFIA0AAIB6AAIAAAFIAAAPIAyAAQBQAAAABQIgFXpQAABQhQAAIrkgGQhQAAAAhQIAF3pQAAhQBQAAg");
	this.shape_1.setTransform(118.4,146.9,0.624,0.624,-90);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.rf(["#CCCCCC","#FFFFFF","#999999"],[0.165,0.416,1],-39,89,0,-39,89,105.4).s().p("AhXACIADgDIAzAAIB5AAIAAADg");
	this.shape_2.setTransform(65.6,132.3,0.624,0.624,-90);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.rf(["#CCCCCC","#FFFFFF","#999999"],[0.165,0.416,1],-15.4,3.6,0,-15.4,3.6,105.4).s().p("Al0NLQhQAAAAhQIAF3pQAAhQBQAAIICAFIAAgPICwAAIAAAPIAyAAQBQAAAABQIgFXpQAABQhQAAgADJtNIB6gCIAAACg");
	this.shape_3.setTransform(118.3,146.9,0.624,0.624,-90);

	// Layer 1
	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#666666").s().p("AgiAjQgPgOAAgVQAAgTAPgPQAOgOAUAAQAUAAAPAOQAOAPAAATQAAAVgOAOQgPAOgUABQgUgBgOgOg");
	this.shape_4.setTransform(61,161.5);

	this.instance_1 = new lib.tabletscreenv("synched",0);
	this.instance_1.setTransform(61.2,79,1,1,0,0,0,55.2,73.5);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f().s("#999999").ss(1,1,1).p("AoOtEINuAAIAAgPIAAgFICCAAIAAAFIAAAPIAyAAQBQAAAABQIgFX9QAABQhQAAIwiAAQhQAAAAhQIAF39QAAhQBQAAg");
	this.shape_5.setTransform(60.8,83.8);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.rf(["#CCCCCC","#FFFFFF","#999999"],[0.165,0.416,1],-41.5,88.8,0,-41.5,88.8,105.4).s().p("Ag/ACIAAgDIB/AAIAAADg");
	this.shape_6.setTransform(102.5,-1.7);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.rf(["#CCCCCC","#FFFFFF","#999999"],[0.165,0.416,1],0.3,2.4,0,0.3,2.4,105.4).s().p("AoTNaQhQAAAAhQIAF39QAAhQBQAAINuAAIAAgPICCAAIAAAPIAyAAQBQAAAABQIgFX9QAABQhQAAgAFgtXIAAgCICCAAIAAACg");
	this.shape_7.setTransform(60.8,83.6);

	// Layer 4
	this.instance_2 = new lib.shadow("synched",0);
	this.instance_2.setTransform(57.5,169.3,1.261,0.051,0,0,0,52,38.5);

	this.instance_3 = new lib.shadow("synched",0);
	this.instance_3.setTransform(119.6,174.6,1.109,0.051,0,0,0,52,38.5);

	this.addChild(this.instance_3,this.instance_2,this.shape_7,this.shape_6,this.shape_5,this.instance_1,this.shape_4,this.shape_3,this.shape_2,this.shape_1,this.shape,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-8.1,-3,185.4,179.6);


(lib.deviceanim = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.play();
	}
	this.frame_9 = function() {
		this.stop();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(9).call(this.frame_9).wait(1));

	// Layer 1
	this.instance = new lib.devices("synched",0);
	this.instance.setTransform(131.6,94.1,0.72,0.72,0,0,0,86.5,91.8);
	this.instance.alpha = 0.27;

	this.timeline.addTween(cjs.Tween.get(this.instance).to({scaleX:1,scaleY:1,alpha:1},9).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(63.4,25.5,133.5,129.7);


(lib.monitoranim = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.play();
	}
	this.frame_9 = function() {
		this.stop();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(9).call(this.frame_9).wait(1));

	// Layer 1
	this.instance = new lib.monitor("synched",0);
	this.instance.setTransform(115.5,94.3,0.8,0.8,0,0,0,115.5,94.3);
	this.instance.alpha = 0.27;

	this.timeline.addTween(cjs.Tween.get(this.instance).to({scaleX:1,scaleY:1,alpha:1},9,cjs.Ease.get(1)).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(18.9,18.9,194.5,150.9);


(lib.infoG1_mc = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.animState = '';
		
		var clip = this;
		
		this.timeout = function(count){
			if(!count){
				count =1
			}
			
			count = count *1000;
			this.stop();
			
			setTimeout(function(){
				if(clip.animState!='stop'){
					clip.play();
				}
			}, count);
			
		}
		
		//Set Copy
		
		this.title.text=infoG1_title;
		this.descr.text=infoG1_descr;
	}
	this.frame_14 = function() {
		this.timeout();
		
		this.p1_title.text=infoG1_p1_title;
		this.p1_descr.text=infoG1_p1_descr;
		this.p1_bub_descr.text=infoG1_p1_bub_descr;
	}
	this.frame_26 = function() {
		this.timeout();
		
		this.p2_title.text=infoG1_p2_title;
		this.p2_descr.text=infoG1_p2_descr;
		this.p2_bub_descr.text=infoG1_p2_bub_descr;
	}
	this.frame_40 = function() {
		this.stop();
		this.animState = 'stop';
		
		this.p3_title.text=infoG1_p3_title;
		this.p3_descr.text=infoG1_p3_descr;
		this.p3_bub_descr.text=infoG1_p3_bub_descr;
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(14).call(this.frame_14).wait(12).call(this.frame_26).wait(14).call(this.frame_40).wait(8));

	// Script
	this.peopleMovie = new lib.people();
	this.peopleMovie.setTransform(954.3,83.6,1,1,0,0,0,332.4,301.8);
	this.peopleMovie._off = true;

	this.timeline.addTween(cjs.Tween.get(this.peopleMovie).wait(40).to({_off:false},0).to({_off:true},7).wait(1));

	// Monitor
	this.monitor = new lib.monitoranim();
	this.monitor.setTransform(123.7,298.5,1,1,0,0,0,115.5,94.3);
	this.monitor._off = true;

	this.timeline.addTween(cjs.Tween.get(this.monitor).wait(14).to({_off:false},0).to({_off:true},33).wait(1));

	// Devices
	this.instance = new lib.deviceanim();
	this.instance.setTransform(422.8,294,1,1,0,0,0,86.5,91.8);
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(26).to({_off:false},0).to({_off:true},21).wait(1));

	// FlashAICB
	this.descr = new cjs.Text("mag+ digital publishing software covers every part of the app publishing process: Design your content using simple tools; build your own branded mobile app on our web portal; and distribute your designed content to that app for end users to experience on their mobile devices. ", "17px 'Helvetica'", "#333333");
	this.descr.name = "descr";
	this.descr.lineHeight = 19;
	this.descr.lineWidth = 628;
	this.descr.setTransform(7,80);

	this.title = new cjs.Text("How it works", "bold 43px 'Helvetica'", "#333333");
	this.title.name = "title";
	this.title.lineHeight = 45;
	this.title.lineWidth = 319;
	this.title.setTransform(6,9);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.title},{t:this.descr}]}).to({state:[]},47).wait(1));

	// Txt Support
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#72A0CF").ss(1,1,1).p("AlXg9IZ1gCIAACFAzNhFIhQAAIAACG");
	this.shape.setTransform(790,556.7);

	this.p3_bub_descr = new cjs.Text("Our 24/7 support team can answer any question, or you can check out our extensive online resources.", "12px 'Helvetica'", "#666666");
	this.p3_bub_descr.name = "p3_bub_descr";
	this.p3_bub_descr.lineHeight = 14;
	this.p3_bub_descr.lineWidth = 214;
	this.p3_bub_descr.setTransform(700.4,570);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AjhEaQgeAAgXgXQgVgVgBggIAAkqQABgfAVgXQAXgWAeAAIByAAIAAhLQgBgPALgMQALgLAQAAICVAAQAPAAALALQALAMAAAPIAABLIBxAAQAfAAAWAWQAXAXAAAfIAAEqQAAAggXAVQgWAXgfAAgAiVBeIBwAAIAABwIBKAAIAAhwIBxAAIAAhMIhxAAIAAhuIhKAAIAABuIhwAAgAhKioICVAAIAAhLIiVAAg");
	this.shape_1.setTransform(676.1,581.2,0.317,0.317);

	this.text = new cjs.Text("Need a hand?", "12px 'Helvetica'", "#72A0CF");
	this.text.lineHeight = 14;
	this.text.lineWidth = 78;
	this.text.setTransform(669.9,544);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#72A0CF").s().p("Ah1B2QgxgxAAhFQAAhFAxgxQAxgwBEAAQBGAAAwAwQAxAxAABFQAABFgxAxQgwAxhGAAQhEAAgxgxg");
	this.shape_2.setTransform(675.9,581.9);

	this.p3_title = new cjs.Text("PUBLISH", "19px 'Helvetica'", "#848484");
	this.p3_title.name = "p3_title";
	this.p3_title.lineHeight = 21;
	this.p3_title.lineWidth = 216;
	this.p3_title.setTransform(656,420);

	this.p3_descr = new cjs.Text("Once your app is on your users’ devices, publishing your content—whether documents, issues, push messages or live feeds—is as simple as uploading a file and pushing a button.", "12px 'Helvetica'", "#666666");
	this.p3_descr.name = "p3_descr";
	this.p3_descr.lineHeight = 14;
	this.p3_descr.lineWidth = 260;
	this.p3_descr.setTransform(657,456);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[{t:this.p3_descr},{t:this.p3_title},{t:this.shape_2},{t:this.text},{t:this.shape_1},{t:this.p3_bub_descr},{t:this.shape}]},40).to({state:[]},7).wait(1));

	// Txt Build
	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f().s("#72A0CF").ss(1,1,1).p("AA8hFITnAFIAACGAzShDIhQAAIAACG");
	this.shape_3.setTransform(467,556.5);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AgeCgQAAgagSgRQgSgSgZAAQgQAAgPAIIgfg2QAWgOAHgXQAGgXgNgWQgIgPgOgHIAfg2QAWANAZgHQAYgGANgXQAJgPgBgQIA9AAQAAAaASASQASASAZAAQAQAAAOgIIAgA2QgWANgHAYQgGAXAMAVQAIAOAOAJIgfA2QgWgNgYAHQgYAHgNAVQgIAOAAARgAgsgsQgTATAAAZQAAAaATAUQATASAZABQAagBATgSQATgUAAgaQAAgZgTgTQgTgTgaAAQgZAAgTATg");
	this.shape_4.setTransform(351.9,581.8,0.672,0.672);

	this.p2_bub_descr = new cjs.Text("Our mag+ App SDK lets you custom develop your own app around \nour engine.", "12px 'Helvetica'", "#666666");
	this.p2_bub_descr.name = "p2_bub_descr";
	this.p2_bub_descr.lineHeight = 14;
	this.p2_bub_descr.lineWidth = 216;
	this.p2_bub_descr.setTransform(375,570);

	this.text_1 = new cjs.Text("Need more features?", "12px 'Helvetica'", "#72A0CF");
	this.text_1.lineHeight = 14;
	this.text_1.lineWidth = 115;
	this.text_1.setTransform(347.4,544);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#72A0CF").s().p("Ah1B2QgxgxAAhFQAAhFAxgxQAxgwBEAAQBGAAAxAwQAwAxAABFQAABFgwAxQgxAxhGAAQhEAAgxgxg");
	this.shape_5.setTransform(351.9,581.9);

	this.p2_title = new cjs.Text("BUILD & DISTRIBUTE", "19px 'Helvetica'", "#848484");
	this.p2_title.name = "p2_title";
	this.p2_title.lineHeight = 21;
	this.p2_title.lineWidth = 216;
	this.p2_title.setTransform(331,420);

	this.p2_descr = new cjs.Text("Your mag+ powered mobile app is how users consume your content. Use our web tools to create a fully branded app with analytics, messaging and more, for public or internal use.", "12px 'Helvetica'", "#666666");
	this.p2_descr.name = "p2_descr";
	this.p2_descr.lineHeight = 14;
	this.p2_descr.lineWidth = 261;
	this.p2_descr.setTransform(333,455);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[{t:this.p2_descr},{t:this.p2_title},{t:this.shape_5},{t:this.text_1},{t:this.p2_bub_descr},{t:this.shape_4},{t:this.shape_3}]},26).to({state:[]},21).wait(1));

	// Txt Design
	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f().s("#72A0CF").ss(1,1,1).p("AiBhAIWkAAIAACFAzShEIhQAAIAACH");
	this.shape_6.setTransform(137.5,556.1);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("ADLESIlclcQgIgJAAgKQAAgLAIgIIAhghQAIgIALAAQAKAAAJAIIFcFcQAIAJAAAKQAAALgIAIIghAhQgIAIgLAAQgLAAgIgIgAh6hWIBqBnIAhghIhnhqgAhoBpIAAhGIAjAAIAABGgAj1BGIAAgjIBGhFIAkAiIhHBGgAAihFIAAgjIBHAAIAAAjgAkZhFIAAgjIBHAAIAAAjgAgiivIBEhGIAkAAIAAAjIhGBHgAj1jSIAAgjIAjAAIBHBGIgkAkgAhojSIAAhHIAjAAIAABHg");
	this.shape_7.setTransform(21.7,582.3,0.333,0.333);

	this.p1_bub_descr = new cjs.Text("Our in-house creative agency, mag+ Studios, can take on all design and production work.", "12px 'Helvetica'", "#666666");
	this.p1_bub_descr.name = "p1_bub_descr";
	this.p1_bub_descr.lineHeight = 14;
	this.p1_bub_descr.lineWidth = 220;
	this.p1_bub_descr.setTransform(45.1,570);

	this.text_2 = new cjs.Text("Need design help?", "12px 'Helvetica'", "#72A0CF");
	this.text_2.lineHeight = 14;
	this.text_2.lineWidth = 139;
	this.text_2.setTransform(15.8,544);

	this.p1_title = new cjs.Text("DESIGN", "19px 'Helvetica'", "#848484");
	this.p1_title.name = "p1_title";
	this.p1_title.lineHeight = 21;
	this.p1_title.lineWidth = 126;
	this.p1_title.setTransform(4,420);

	this.p1_descr = new cjs.Text("mag+ offers a powerful plug-in for Adobe InDesign, the most popular design software \nin the world. Your existing team can create interactive, multimedia layouts native for \nthe touchscreen.", "12px 'Helvetica'", "#666666");
	this.p1_descr.name = "p1_descr";
	this.p1_descr.lineHeight = 14;
	this.p1_descr.lineWidth = 260;
	this.p1_descr.setTransform(5,456);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#72A0CF").s().p("Ah1B2QgxgxAAhFQAAhFAxgxQAxgwBEAAQBGAAAwAwQAxAxAABFQAABFgxAxQgwAxhGAAQhEAAgxgxg");
	this.shape_8.setTransform(22.3,581.9);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[{t:this.shape_8},{t:this.p1_descr},{t:this.p1_title},{t:this.text_2},{t:this.p1_bub_descr},{t:this.shape_7},{t:this.shape_6}]},14).wait(34));

	// Layer 6
	this.arrowTail1 = new lib.arrowTail1();
	this.arrowTail1.setTransform(-657.5,290.1,1,1,0,0,0,290.4,27.5);
	this.arrowTail1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.arrowTail1).wait(1).to({_off:false},0).to({x:-249.8,y:291.7},13,cjs.Ease.get(1)).to({x:-102.6,y:292.3},4,cjs.Ease.get(-1)).to({x:-23.4,y:292.6},8,cjs.Ease.get(1)).to({_off:true},21).wait(1));

	// Layer 5 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	var mask_graphics_26 = new cjs.Graphics().p("A3NdJIMwswIuducMBVPAAAIAAbMg");

	this.timeline.addTween(cjs.Tween.get(mask).to({graphics:null,x:0,y:0}).wait(26).to({graphics:mask_graphics_26,x:386.2,y:186.6}).wait(22));

	// Layer 8
	this.arrowTail1_1 = new lib.arrowTail1();
	this.arrowTail1_1.setTransform(-12,292.1,1,1,0,0,0,290.4,27.5);
	this.arrowTail1_1._off = true;

	this.arrowTail1_1.mask = mask;

	this.timeline.addTween(cjs.Tween.get(this.arrowTail1_1).wait(26).to({_off:false},0).to({x:300.4,y:291.3},14).to({_off:true},7).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-305.8,-77.9,1440,659);


// stage content:



(lib.infographic1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		//Set Variables
		var baseWidth = 468;
		var baseHeight = 325;
		var infoG_mc = this.infoG_mc;
		var stage = this;
		var playStatus = false;
		var infoG_mc_Org_X =this.infoG_mc.x;
		var infoG_mc_Org_y =this.infoG_mc.y;
		
		var pixRat = Math.round(window.devicePixelRatio);
		
		//Add Listeners
		function handleResize(event) {
		
		    var w = window.innerWidth;
		    var h = window.innerHeight;
			var contentWidth = lib.properties.width*pixRat; // The exported content size
			//this.width = w/2;
			//this.height =h/2;
			//alert(contentWidth);
			stage.scaleX = stage.scaleY = pixRat;
			if(baseWidth*2 < w){
				infoG_mc.x = (w/2)- baseWidth;
			}
			else{
				infoG_mc.x =infoG_mc_Org_X;
			}
			
			
		}
		window.addEventListener("resize", handleResize);
		
		//Public Functions
		
		this.Play = function(){
			if(!playStatus){
				infoG_mc.animState ='';
				this.SetStatus(true);
				infoG_mc.play();
			}
			return false;
		}
		this.Reset = function(){
			infoG_mc.animState ='stop';
			this.SetStatus(false);
			infoG_mc.gotoAndStop(1);
			return false;
		}
		
		this.SetStatus = function(e){
			playStatus = e;
			return false;
		}
		
		
		
		//Initilize
		infoG_mc.stop();
		handleResize();
		
		infoG_mc.stop();
		if(!window.infographics){
			infoG_mc.play();
		}
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(1));

	// Layer 11
	this.infoG_mc = new lib.infoG1_mc();
	this.infoG_mc.setTransform(23,53,1,1,0,0,0,23,23);

	this.timeline.addTween(cjs.Tween.get(this.infoG_mc).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(486,384,633.2,149);

})(lib1 = lib1||{}, images = images||{}, createjs = createjs||{});
var lib1, images, createjs;