create procedure sp_QRTag (@otnumber int)
--exec sp_QRTag 28766
as
begin
	select row_number() over(partition by wt.GardenInvoiceNo order by (select null)) as BagNumber,
																hs.SupplierName,wt.GardenInvoiceNo,hg.GardenName,
																gr.GradeName,oth.ShippingMarks as batchnumber
		from whOutwardTallyDtl otd
		inner join whOutwardTallyHdr oth on oth.SerialNo=otd.SerialNo
		inner join whTeaDetails wt on otd.GISerialNo=wt.SerialNo
		inner join hGarden hg on hg.GardenCode=wt.GardenCode
		inner join hSupplier hs on hs.SupplierCode=oth.SupplierCode
		inner join hGrade gr on gr.GradeCode=wt.GradeCode
		cross apply fnNumbers (1,NoOfPkgs,1)
		where otd.SerialNo=@otnumber
end
