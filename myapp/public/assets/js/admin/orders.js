//Code chatGPT nha mn
document.querySelectorAll('.status-select').forEach(select => {
    select.addEventListener('change', function () {
      const orderId = this.dataset.orderId;
      const newStatus = this.value;

      if (confirm(`Bạn có chắc muốn cập nhật trạng thái đơn hàng #${orderId} thành "${newStatus}" không?`)) {
        fetch('/web_bantrasua/myapp/admin/order/updateStatus', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ orderId, status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Cập nhật thành công!');
          } else {
            alert('Lỗi khi cập nhật trạng thái.');
          }
        });
      } else {
        // Nếu người dùng hủy thì reload lại select để hiển thị đúng trạng thái cũ
        window.location.reload();
      }
    });
  });
