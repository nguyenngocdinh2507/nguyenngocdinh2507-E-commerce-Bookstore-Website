


  
  
  
  
  
  html{display: none;}
  
  
      
    
    
    
    
    
    localhost:8080 / 127.0.0.1 | phpMyAdmin 5.1.3
    
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


// 


  html{display:block}


    
    
    
    
      

                  
                          
                                      
                                      
                      
        
        
          

                      
          
          

          

          

          
        

        
        
      
      

  Mới dùng`quanlydienthoai`.`taikhoan``quanlydienthoai`.`nhanvien``quanlydienthoai`.`chitiethoadon``quanlydienthoai`.`chitetphieunhap``quanlypizza`.`phieunhap``quanlypizza`.`sanpham``quanlypizza`.`taikhoan``quanlypizza`.`khachhang``quanlypizza`.`hoadon``quanlypizza`.`cthoadon`Ưa dùngKhông có bảng ưa dùng nào.




  
  





  
    Mới15103059-umlinformation_schemainstrumentstoremysqlperformance_schemaphpmyadminquancaphequanlibansachquanlypizzatraining
  



      

      
                  
  
      
    
  

      Bảng điều hướng
      Cây điều hướng
      Máy phục vụ
      Cơ sở dữ liệu
      Các bảng
  


Bảng điều hướng
    Tùy chỉnh diện mạo của bảng điều hướng.

Hiển thị bảng điều hướng cơ sở dữ liệu dạng cây
Trong bảng điều hướng, thay thế cây cơ sở dữ liệu bằng một bộ chọnLiên kết với bảng điều khiển chính
Liên kết với bảng điều khiển chính bằng cách tô sáng cơ sở dữ liệu hay bảng hiện tại.Hiện biểu tượng
Hiện biểu tượng trong bảng điều hướngURL của Logo
URL nơi mà biểu tượng trong bảng điều hướng sẽ chỉ đến đó.Đích của liên kết Logo
Mở trang đã liên kết trong cửa số chính (main) hay trong một cái mới (new).mainnewTô sáng
Tô sáng máy chủ dưới con trỏ chuột.Số mục tối đa ở mức đầu tiên
Số lượng mục mà nó có thể được trình bày trên mỗi trang của cây điều hướngCác định nghĩa số lượng mục tin được hiển thị trong hộp lọc tối thiểu.
Các định nghĩa số lượng mục tin (bảng, view, thủ tục, sự kiện) được hiển thị trong hộp lọc tối thiểu.Các bảng mới dùng gần đây
Số lượng hàng tối đa có thể hiển thịBảng ưa dùng
Số lượng hàng tối đa có thể hiển thịĐộ rộng bảng điều hướng
Set to 0 to collapse navigation panel.


Cây điều hướng
    Cá nhân hóa cây điều hướng.

Số mục tin tối đa trên nhánh
Số lượng mục mà nó có thể được trình bày trên mỗi trang của cây điều hướngNhóm các mục tin trong cây
Nhóm các mục tin trong cây điều hướng (được nhận dạng bởi định nghĩa ngăn cách trong Cơ sở dữ liệu và Bảng tab ở phía trên).Bật mở rộng cây điều hướng
Có để cho giãn rộng cây trong bản điều hướng hay không.Hiện bảng trong cây
Có cho hiển thị các bảng dưới cơ sở dữ liệu trong cây điều hướng hay khôngHiện view trong cây
Có cho hiển thị các view dưới dữ liệu trong cây điều hướng hay khôngHiển thị các hàm trong cây
Có cho hiển thị các hàm dưới cơ sở dữ liệu trong cây điều hướng hay khôngHiển thị thủ tục trong cây
Có cho hiển thị các thủ tục dưới cơ sở dữ liệu trong cây điều hướng hay khôngHiển thị sự kiện trong cây
Có cho hiển thị các sự kiện dưới cơ sở dữ liệu trong cây điều hướng hay khôngExpand single database
Whether to expand single database in the navigation tree automatically.


Máy phục vụ
    Các tùy chọn trình bày máy chủ.

Hiển thị bộ chọn máy dịch vụ
Hiển thị lựa chọn máy chủ tại đỉnh của bảng điều hướng.Hiển thị các máy chủ dạng danh sách
Hiện danh sách máy chủ dạng danh sách thay cho kiểu thả xuống.


Cơ sở dữ liệu
    Hiển thị tùy chọn thêm

Số lượng cơ sở dữ liệu trình bày ở hộp lọc cơ sở dữ liệu tối đa
Dấu ngăn cách cây cơ sở dữ liệu
Chuỗi mà ngăn cách các cơ sở dữ liệu thành các mức cây khác nhau.


Các bảng
    Các tùy chọn trình bày bảng.

Đích cho biểu tượng truy cập nhanh
Cấu trúcSQLTìm kiếmChènDuyệtĐích cho biểu tượng truy cập nhanh thứ hai
Cấu trúcSQLTìm kiếmChènDuyệtDấu ngăn cách cây bảng
Chuỗi mà ngăn cách các bảng thành các mức cây khác nhau.Độ sâu cây bảng tối đa





    if (typeof configInlineParams === 'undefined' || !Array.isArray(configInlineParams)) {
        configInlineParams = [];
    }
    configInlineParams.push(function () {
        registerFieldValidator('FirstLevelNavigationItems', 'validatePositiveNumber', true);
registerFieldValidator('NavigationTreeDisplayItemFilterMinimum', 'validatePositiveNumber', true);
registerFieldValidator('NumRecentTables', 'validateNonNegativeNumber', true);
registerFieldValidator('NumFavoriteTables', 'validateNonNegativeNumber', true);
registerFieldValidator('NavigationWidth', 'validateNonNegativeNumber', true);
registerFieldValidator('MaxNavigationItems', 'validatePositiveNumber', true);
registerFieldValidator('NavigationTreeTableLevel', 'validatePositiveNumber', true);
$.extend(Messages, {
	'error_nan_p': 'không phải là số hiệu phiên bản',
	'error_nan_nneg': 'Không là con số âm',
	'error_incorrect_port': 'Số hiệu cổng không hợp lệ',
	'error_invalid_value': 'Giá trị không đúng!',
	'error_value_lte': 'Giá trị phải nhỏ hơn hoặc bằng %s'});
$.extend(defaultValues, {
	'ShowDatabasesNavigationAsTree': true,
	'NavigationLinkWithMainPanel': true,
	'NavigationDisplayLogo': true,
	'NavigationLogoLink': 'index.php',
	'NavigationLogoLinkWindow': ['main'],
	'NavigationTreePointerEnable': true,
	'FirstLevelNavigationItems': '100',
	'NavigationTreeDisplayItemFilterMinimum': '30',
	'NumRecentTables': '10',
	'NumFavoriteTables': '10',
	'NavigationWidth': '240',
	'MaxNavigationItems': '50',
	'NavigationTreeEnableGrouping': true,
	'NavigationTreeEnableExpansion': true,
	'NavigationTreeShowTables': true,
	'NavigationTreeShowViews': true,
	'NavigationTreeShowFunctions': true,
	'NavigationTreeShowProcedures': true,
	'NavigationTreeShowEvents': true,
	'NavigationTreeAutoexpandSingleDb': true,
	'NavigationDisplayServers': true,
	'DisplayServersList': false,
	'NavigationTreeDisplayDbFilterMinimum': '30',
	'NavigationTreeDbSeparator': '_',
	'NavigationTreeDefaultTabTable': ['structure'],
	'NavigationTreeDefaultTabTable2': [''],
	'NavigationTreeTableSeparator': '__',
	'NavigationTreeTableLevel': '1'});
    });
    if (typeof configScriptLoaded !== 'undefined' && configInlineParams) {
        loadInlineConfig();
    }


              
    

          
        Thả tập tin vào đây      
      
        
          SQL upload          ( 0 )
          x
          -
        
        
      
      

  
  
    
        
        
        
        
        Trình duyệt của bạn có cấu hình phpMyAdmin cho miền này. Bạn có muốn nhập vào phiên này không?        
        Có
        / Không
        / Delete settings
    



  
      
      
   Javascript phải được bật qua điểm này!


    
  
      

  
    
      
      
        Máy chủ:        127.0.0.1
      
    

      


  
    
      
    
    
      
                  
            
              &nbsp;Cơ sở dữ liệu
                          
          
                  
            
              &nbsp;SQL
                          
          
                  
            
              &nbsp;Tình trạng
                          
          
                  
            
              &nbsp;Các tài khoản người dùng
                          
          
                  
            
              &nbsp;Xuất
                          
          
                  
            
              &nbsp;Nhập
                          
          
                  
            
              &nbsp;Cài đặt
                          
          
                  
            
              &nbsp;Bản sao
                          
          
                  
            
              &nbsp;Biến
                          
          
                  
            
              &nbsp;Bảng mã
                          
          
                  
            
              &nbsp;Bộ máy
                          
          
                  
            
              &nbsp;Phần bổ sung
                          
          
              
    
  


    
      
      
        
      
      
    
  
  
    
                
                    
            
            Bảng điều khiển
        
                            
            
            Xóa sạch
        
                            
            
            Lịch sử
        
                            
            
            Tùy chọn
        
                            
            
            Đánh dấu
        
                            
            
            Gỡ rối SQL
        
            
                
            
                
                    
                        Nhấn Ctrl+Enter để thực thi truy vấn                    
                    
                        Nhấn Enter để thực thi truy vấn                    
                
                            
            
                
            
        
                
                
            
                    
            
            tăng dần
        
                            
            
            giảm dần
        
                            
            
            Thứ tự:
        
                            
            
            Gỡ rối SQL
        
                            
            
            Số lượng
        
                            
            
            Thứ tự thực thi
        
                            
            
            Thời gian cần
        
                            
            
            Xếp theo:
        
                            
            
            Nhóm truy vấn
        
                            
            
            Bỏ nhóm các truy vấn
        
            
            
                
                
             
            
                
                    
            Co lại
                    
                            
            Mở rộng
                    
                            
            Hiện theo dõi
                    
                            
            Ẩn theo dõi
                    
                            
            Số lượng
                    
                            
            Thời gian cần
                    
            
             
         
                        
            
                    
            
            Tùy chọn
        
                            
            
            Đặt lại thành mặc định
        
            
            
                
                    Luôn mở rộng các lời nhắn truy vấn                
                
                
                    Hiển thị lịch sử truy vấn lúc bắt đầu                
                
                
                    Show current browsing query                
                
                
                    
                        Thực thi truy vấn bằng Enter và chèn thêm dòng mới bằng Shift + Enter. Để cài lâu dài, xem các cài đặt.                
                
                
                    Chuyển sang chủ đề tối                
                
            
         
        
                        
                    
            Co lại
                    
                            
            Mở rộng
                    
                            
            Truy vấn lại
                    
                            
            Sửa
                    
                            
            Giải thích
                    
                            
            Hồ sơ
                    
                            
            Đánh dấu
                    
                            
            Truy vấn bị lỗi
                    
                            
            Cơ sở dữ liệu
                            : 
                    
                            
            Thời gian truy vấn
                            : 
                    
            
        
     
 


  
    

    



    
    
    phpMyAdmin
    
    
        html {
            padding: 0;
            margin: 0;
        }
        body  {
            font-family: sans-serif;
            font-size: small;
            color: #000000;
            background-color: #F5F5F5;
            margin: 1em;
        }
        h1 {
            margin: 0;
            padding: 0.3em;
            font-size: 1.4em;
            font-weight: bold;
            color: #ffffff;
            background-color: #ff0000;
        }
        p {
            margin: 0;
            padding: 0.5em;
            border: 0.1em solid red;
            background-color: #ffeeee;
        }
    


phpMyAdmin - Lỗi
index.php: Thiếu tham số: whatindex.php: Thiếu tham số: export_type


  
  

  
    
  

  

// 



  
  
  

