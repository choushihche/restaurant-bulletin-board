<!-- #include virtual="DB.FUN" -->
<!-- #include virtual="LNG.FUN" -->
<!-- #include file="../include/init.asp" -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<%
Server.ScriptTimeout = 900
Set fso = CreateObject("Scripting.FileSystemObject")

Dim uploadpath
uploadpath = WEBPATH & "pet\photo\" '新檔上傳的指定路徑
filepath = WEBPATH & "pet\photo\" '上傳前路徑
backpath = WEBPATH & "pet\back\" '上傳後備份路徑
'Response.Write uploadpath & "<BR>"
'Response.End

Set Upload = Server.CreateObject("Persits.Upload.1")
Upload.CodePage = 65001
Upload.OverwriteFiles = true

Upload.SetMaxSize 40960000,true
On Error Resume Next
'Count = Upload.SaveVirtual("upload")
Upload.Save uploadpath
if Err.Number = 8 then
	Response.Write "<font color=red>檔案超過 40 Mbytes。 </font>"
else
    If Err <> 0 Then
		'Response.Write Err.Description
		'Response.write "<font color=red>檔案選取欄位不可為空白。</font>"
		ErrMsg = GetWarningName(8, Session("sys_language"))
%>
<script language="JavaScript">
	alert("<%=ErrMsg%>");
	window.history.back();
</script>
<%
		Response.End
	else
		For Each Item in Upload.Form '取代 Request.Form
			'Response.Write Item.Name & "= " & Item.Value & "<BR>"
			If Item.Name = "RCN" Then
				RCN = Item.Value
			End If
			If Item.Name = "ky" Then
				ky = Item.Value
			End If
			If Item.Name = "ppp" Then
				ppp = Item.Value
			End If
		Next	
	
		For Each File in Upload.Files
			'Response.Write Ucase(File.ImageType) & "<BR>"
			fn = File.FileName
			ExtName = fso.GetExtensionName(uploadpath & File.FileName)
			'Response.Write "FN:" & ExtName & "<BR>"
			'Response.Write File.FileName & "<BR>"
			'Response.End
        	If Ucase(ExtName) = "JPG" or Ucase(ExtName) = "GIF" or Ucase(ExtName) = "JPEG" or Ucase(ExtName) = "PNG" Then
            	'Response.Write "<IMG SRC=""/news/images/"& File.FileName &"""" & ">"
                'Response.Write  "原始檔案路徑：" & File.OriginalPath
                'Response最?????.Write  "圖片大小：" & File.ImageWidth & "x"  & File.ImageHeight & "  pixels"
                'Response.Write  "成功上傳" & Count & "個檔案。"
				If fso.FolderExists(uploadpath & lg & "\" & nid) Then
				else
					Set f = fso.CreateFolder(uploadpath & lg & "\" & nid)
				end if
				'pdt_img = "PD" & pid & "_" & img_date & "." & fileExt
				img_date = year(now) & month(now) & day(now) & hour(now) & minute(now) & second(now)
				newfilename = "PP_" & img_date & "." & ExtName
				
				'Response.Write "pid:" & pid & "<BR>"
				'Response.Write newfilename & "<BR>"
				'Response.End
				fso.CopyFile uploadpath & File.FileName,uploadpath & newfilename, 1
				File.Delete
				
            else
                File.Delete
				ErrPicFormat = GetWarningName(8, Session("sys_language"))
				'Response.Write "ERR: MSG: " & ErrPicFormat
				'Response.End
%>
<script language="JavaScript">
	alert("<%=ErrPicFormat%>");
	window.history.back();
</script>
<%
                'Response.Write "只允許WORD、JPG、PDF檔案格式，"
                'Response.Write "<a href=""aspupload_test.asp"">重試</a>" &"。"
				Response.End
            end if
        next
    end if
end if

Response.Write "RCN:" & RCN & "<BR>"
Response.Write "ky:" & ky & "<BR>"
Response.Write "ppp:" & ppp & "<BR>"
Response.Write "fileName:" & fn & "<BR>"
Response.Write "fileName:" & newfilename & "<BR>"
'Response.End

if newfilename <> "" Then

else
	ErrMsg = GetWarningName(9, Session("sys_language"))
%>
<script language="JavaScript">
	alert("<%=ErrMsg%>");
	window.history.back();
</script>
<%
	Response.End
end if
'Item.Name 上傳項目的名稱 
'Item.Value 上傳項目的值
If RCN <> "" And ky <> "" Then

	RRSQL = "select * from RegRecord"
	RRSQL = RRSQL & " where Medical_Rec_no = '" & RCN & "'"
	RRSQL = RRSQL & " and id = " & ky & ""
	'Response.Write RRSQL
	'Response.End
	
	set rrrs = GetDB(myHost, HostID, PWD, RRDB, RRSQL)
	
	If rrrs Is Nothing Then
		Response.Write "Cannot Open RegRecord Database"
		Response.End
	End If
	
	If rrrs.EOF Then
	%>
	<script language="JavaScript">
		alert("Cannot Find this record!!");
		window.history.back();
	</script>
	<%
		Response.End
	End If
	
	old_img = rrrs("pictures")
	'Response.Write "OLD:" & old_img & "<BR>"
	'Response.end
'@@@ 刪除舊照片 @@@
	If old_img <> "" Then
		OPic = WEBPATH & "pet\photo\" & old_img
		
		if (fso.FileExists(OPic)) Then
			fso.DeleteFile(OPic)
		end if
	Else

	end If

	rrrs("pictures") = newfilename
	rrrs.update


	Session("MSG") = "重要檔案上傳成功"
	Response.Redirect "editpets.asp?RCN=" & RCN & "&ky=" & ky & ppp 
	Response.End
End If
'File.Path 上傳檔案後的路徑名稱 
'File.Size 上傳檔案的大小 
ErrMsg = GetWarningName(45, Session("sys_language")) 
%>
<script language="JavaScript">
	alert("<%=ErrMsg%>");
	window.history.back();
</script>
